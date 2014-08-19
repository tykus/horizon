<?php namespace Horizon\Repositories;

use Config;
use Setting;

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
		
		dd($setting);	
		// Validate data

		// Update the object

		// return to caller
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

