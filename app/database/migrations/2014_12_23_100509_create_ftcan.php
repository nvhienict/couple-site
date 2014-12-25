<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFtCan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ftcan', function($table)
		{
			//
			$table->increments("id");
			$table->string("ten");
			$table->string("nam");
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
		Schema::table('ftcan', function($table)
		{
			//
			drop::table('ftcan');
		});
	}

}
