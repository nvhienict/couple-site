<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories',function($table){
			$table->increments("id");
			$table->string("name");
			$table->string("description");
			$table->float("range1");
			$table->float("range2");
			$table->float("range3");
			$table->float("range4");
			$table->float("range5");
			$table->string('images');
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
		Schema::drop("categories");
	}

}
