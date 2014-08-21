<?php namespace Horizon\Repositories;

interface SettingsRepositoryInterface {

	public function findByKey($key);
	
	public function setConfig();

	public function getMenuItems();
	
	public function update($id, $data);
}