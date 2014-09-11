<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabWebsite extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabWebsite',function($table){

			$table->increments("id");
			$table->integer("website");
			$table->string("title");
			$table->string("content");
			$table->boolean("visiable");
			$table->string("titlestyle");
			$table->integer("sort");
			$table->string("video");
			$table->string("map");
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
		Schema::drop('tabWebsite');
	}

}
