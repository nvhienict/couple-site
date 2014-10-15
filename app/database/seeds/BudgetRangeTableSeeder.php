
<?php
	class BudgetRangeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('budgetrange')->delete();

        BudgetRange::create(array(
            'min'=>'0',
            'max'=>'150')
        );

        BudgetRange::create(array(
            'min'=>'150',
            'max'=>'300')
        );

        BudgetRange::create(array(
            'min'=>'300',
            'max'=>'0')
        );

    }

}