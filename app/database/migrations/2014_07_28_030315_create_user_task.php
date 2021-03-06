
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTask extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('usertask',function($table){
			$table->increments('id');
			$table->integer('user');
			$table->string('title');
			$table->string('description');
			$table->integer('category');
			$table->integer('startdate');
			$table->string('link');
			$table->integer('todo');
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
		Schema::drop('usertask');
	}

}
