
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendors extends Migration {

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
			$table->string('website');
			$table->string('email');
			$table->binary('avatar');
			$table->longText('about');
			$table->integer('album');
			$table->longText('video');
			$table->longText('map');
			$table->integer('category');
			$table->integer('location');
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
		Schema::drop('vendors');
	}

}
