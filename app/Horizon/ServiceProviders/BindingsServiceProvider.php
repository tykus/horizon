<?php namespace Horizon\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class BindingsServiceProvider extends ServiceProvider {
	
	public function register()
	{
		$this->app->bind(
			'Horizon\Repositories\SettingsRepositoryInterface',
			'Horizon\Repositories\EloquentSettingsRepository'
		);
	}

}