<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendors',function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('address');
			$table->string('phone');
			$table->string('email');
			$table->string('website');
			$table->string('avatar');
			$table->string("album");
			$table->string('video');
			$table->string('map');
			$table->longText('about_us');
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
		//
	}

}
