<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuest extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guests',function($table){
			$table->increments("id");
			$table->string("user");
			$table->string("fullname");
			$table->string("email")->unique();
			$table->string("address");
			$table->string("phone");
			$table->integer("attending");
			$table->integer("group");
			$table->boolean("invited");
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
		Schema::drop('guests');
	}

}
