<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFtHungNien extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fthungnien', function($table)
		{
			//
			$table->increments("id");
			$table->string("tuoi");
			$table->string("chu_re");
			$table->string("co_dau");
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
		Schema::table('fthungnien', function($table)
		{
			//
			drop::table('fthungnien');
		});
	}

}
