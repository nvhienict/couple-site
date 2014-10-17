
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
				$table->float('estimate', 0, 0);
				$table->float('actual', 0, 0);
				$table->float('pay', 0, 0);
				$table->longText('note');
				$table->float("range", 0, 0);
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
