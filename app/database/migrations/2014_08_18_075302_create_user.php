<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table)
			{
				$table->increments("id");
				$table->string('email');
				$table->string('password');
				$table->string('firstname');
				$table->string('lastname');
				$table->date('weddingdate');
				$table->integer('role_id');
				$table->string('remember_me');
				$table->integer('budget');
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
		Schema::drop("users");
	}

}