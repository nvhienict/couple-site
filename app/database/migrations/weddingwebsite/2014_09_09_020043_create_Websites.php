<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsites extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weddingwebsite',function($table){
			$table->increments("id");
			$table->integer("user");
			$table->integer("template");
			$table->string("url");
			$table->integer("tab");
			$table->binary("background");
			$table->string("color1");
			$table->string("color2");
			$table->string("color3");
			$table->string("font");
			$table->string("style");
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
		Schema::drop("weddingwebsite");
	}

}
