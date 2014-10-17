
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBudget extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userbudget',function($table)
			{
				$table->increments("id");
				$table->integer('user');
				$table->integer('category');
				$table->string('item');
				$table->double('estimate', 30, 0);
				$table->double('actual', 30, 0);
				$table->double('pay', 30, 0);
				$table->longText('note');
				$table->double("range", 30, 0);
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
		Schema::drop("userbudget");
	}

}
