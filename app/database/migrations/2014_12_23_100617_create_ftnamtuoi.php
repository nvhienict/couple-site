<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFtNamTuoi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ftnamtuoi', function($table)
		{
			//
			$table->increments("id");
			$table->string("nam_tuoi");
			$table->string("dai_loi");
			$table->string("tieu_loi");
			$table->string("ong_co");
			$table->string("phu_mau");
			$table->string("phu_chu");
			$table->string("nu_than");
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
		Schema::table('ftnamtuoi', function($table)
		{
			//
			drop::table('ftnamtuoi');
		});
	}

}
