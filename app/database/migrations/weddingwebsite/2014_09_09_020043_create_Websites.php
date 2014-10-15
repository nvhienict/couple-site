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
			$table->string("url")
			$table->integer("tab");
			$table->string("background");
			$table->string("color1");
			$table->string("color2");
			$table->string("color3");
			$table->string("font");
			$table->float("latitude");
			$table->float("longitude");
			$table->float("longitude");
			$table->date("count_down");
			$table->string("avatar_bride");
			$table->string("avatar_groom");
			$table->string("about_bride");
			$table->string("about_groom");
			$table->string("name_bride");
			$table->string("name_groom");
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
