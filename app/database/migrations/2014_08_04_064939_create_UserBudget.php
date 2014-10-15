
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
				$table->float('estimate');
				$table->float('actual');
				$table->float('pay');
				$table->longText('note');
				$table->float("range");
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
