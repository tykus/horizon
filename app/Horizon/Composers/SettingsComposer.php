<?php namespace Horizon\Composers;
 
use Horizon\Repositories\EloquentSettingsRepository;

class SettingsComposer {
  
  protected $settings;

  public function __construct(EloquentSettingsRepository $settings)
  {
  	$this->settings = $settings;
  }

  public function compose($view)
  {
  	// In Admin, there is a 'Settings' menu which is dynamically generated, but slow-moving
    $view->with('settings', $this->settings->getMenuItems());
  }
 
}