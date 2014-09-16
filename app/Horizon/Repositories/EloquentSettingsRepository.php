<?php namespace Horizon\Repositories;

use Config;
use Setting;
use Validator;
use Cache;

class EloquentSettingsRepository extends DbRepository implements SettingsRepositoryInterface {

  public function __construct(Setting $model)
  {
    $this->model = $model;
  }


  public function findByKey($key)
  {
    return Setting::where('key', $key)->first();
  }

  /**
   * @param $id int
   * @param $data
   */
  public function update($id, $data) {

    $setting = $this->findById($id);

    $rules = ['value' => 'required']; // TODO: move elsewhere!!!!

    // Validate data
    $validate = Validator::make($data, $rules);

    if ($validate->passes())
    {
      $result = $setting->update($data);
    }

    // Need to reset the cached settings after changing the settings
    Cache::forget('config-settings');
    $this->setConfig();

    return $result;

  }


  public function getMenuItems()
  {
    return Setting::where('on_menu', true)
            ->rememberForever('settings_menu') // cached for a day
            ->get(['key']);
  }

  public function setConfig()
  {
    $settings = Setting::where('key', '!=', 'about')
                  ->rememberForever('config-settings')
                  ->lists('value', 'key');

    foreach($settings as $key => $value)
    {
      Config::set("site.business.$key", $value);
    }

  }


}

