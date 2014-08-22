<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('songs',function($table){
			$table->increments("id");
			$table->string("name");
			$table->integer("category");
			$table->string("artist");
			$table->string("genre");
			$table->string("link");
			$table->string("lyric");
			$table->integer("comment");
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
		//
		Schema::drop('songs');
	}

}
