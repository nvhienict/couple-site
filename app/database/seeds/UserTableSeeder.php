
<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'avatar' => 'update/bg22.gif',
        	'email' => 'admin@thuna.vn',
        	'password' => Hash::make('thanhbo'),
        	'firstname'=>'Thanh',
        	'lastname'=>'Nguyen',
        	'weddingdate'=>'',
        	'role_id'=>'1',
        	'remember_me'=>'',
        	'budget'=>'0'

	    )
	    );
    }
}

