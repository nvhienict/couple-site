<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFtChi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ftchi', function($table)
		{
			//
			$table->increments("id");
			$table->string("ten");
			$table->string("code");
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
		Schema::table('ftchi', function($table)
		{
			//
			drop::table('ftchi');
		});
	}

}
