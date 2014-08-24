<?php namespace Horizon\Repositories;

interface ArticleRepositoryInterface {

  public function getLatest();

  public function all();

  public function find($id);

  public function update($id, $data);

  public function store();

  public function newEmpty();

  public function validate();

  public function delete($id);


}
