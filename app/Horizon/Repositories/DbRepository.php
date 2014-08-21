<?php namespace Horizon\Repositories;

class DbRepository {
	
	public function findById($id) {

		return $this->model->find($id);

	}

}