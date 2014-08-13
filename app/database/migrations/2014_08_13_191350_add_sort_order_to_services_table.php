<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSortOrderToServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('services', function(Blueprint $table)
		{
			$table->integer('sort_order')->unique();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('services', function(Blueprint $table)
		{
			$table->dropColumn('sort_order');
		});
	}

}
