<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFtXemNgay extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ftxemngay', function($table)
		{
			//
			$table->increments("id");
			$table->string("ngay_thang_nam");
			$table->string("tuoi_xung_khac");
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
		Schema::table('ftxemngay', function($table)
		{
			//
			drop::table('ftxemngay');
		});
	}

}
