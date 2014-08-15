<?php

class Setting extends \Eloquent {
	protected $fillable = ['key', 'value'];

	public static function onMenu()
	{
		return static::where('on_menu', true)->get();
	}
}