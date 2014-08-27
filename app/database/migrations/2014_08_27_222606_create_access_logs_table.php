<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccessLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('access_logs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->nullable();
			$table->boolean('login_success')->nullable();
			$table->string('ip')->nullable();
			$table->string('country_code')->nullable();
			$table->string('country_name')->nullable();
			$table->string('region_code')->nullable();
			$table->string('region_name')->nullable();
			$table->string('city')->nullable();
			$table->string('zipcode')->nullable();
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();
			$table->string('metro_code')->nullable();
			$table->string('area_code')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('access_logs');
	}

}
