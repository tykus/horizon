<?php namespace Horizon\Repositories;

use Config;
use Setting;
use Validator;

class EloquentSettingsRepository extends DbRepository implements SettingsRepositoryInterface {	
	
	public function __construct(Setting $model)
	{
		$this->model = $model;
	}


	public function findByKey($key)
	{
		return Setting::where('key', $key)->first();
	}

	// TODO: check if this can be abstracted into the parent class??? 
	public function update($id, $data){
		$setting = $this->findById($id);
		
		$rules = ['value' => 'required']; // TODO: move to somewhere else!!!!

		// Validate data
		$validate = Validator::make($data, $rules);

		if ($validate->passes())
		{
			$result = $setting->update($data);
		}

		return $result;

	}


	public function getMenuItems() 
	{
		return Setting::where('on_menu', true)
						->remember(1440, 'settings_menu') // cached for a day
						->get(['key']); 
	}

	public function setConfig() 
	{
		$settings = Setting::where('key', '!=', 'about')
									->remember(1440)
									->lists('value', 'key');

		foreach($settings as $key => $value)
			{
				Config::set("site.business.$key", $value);
			}

	}


}

