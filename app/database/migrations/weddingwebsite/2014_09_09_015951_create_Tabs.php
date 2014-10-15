
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabs',function($table){
			$table->increments("id");
			$table->string("type");
			$table->string("title");
			$table->string("content");
			$table->boolean("visiable");
			$table->string("titlestyle");
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
		Schema::drop("tabs");
	}

}
