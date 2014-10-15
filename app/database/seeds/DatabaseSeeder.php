
<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('UserTableSeeder');
		$this->call('LocationTableSeeder');		
		$this->call('CategoriesTableSeeder');
        $this->call('VendorTableSeeder');
        $this->call('TaskTableSeeder');
        $this->call('BudgetTableSeeder');
        $this->call('BudgetRangeTableSeeder');

        $this->call('SongTableSeeder');
        $this->call('SongCategoryTableSeeder');

        $this->call('TabsTableSeeder');

	}

}


