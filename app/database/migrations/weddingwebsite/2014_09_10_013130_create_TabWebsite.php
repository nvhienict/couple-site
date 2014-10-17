
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
		Schema::create('tabwebsite',function($table){

			$table->increments("id");
			$table->string("type");
			$table->integer("website");
			$table->integer("tab");
			$table->string("title");
			$table->text("content");
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
		Schema::drop('tabwebsite');
	}

}
