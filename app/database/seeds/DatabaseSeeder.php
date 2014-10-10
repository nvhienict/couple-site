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
	}

}
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'email' => 'admin@gmail.com',
        	'password'=>Hash::make('123456'),
        	'firstname'=>'nguyen',
        	'lastname'=>'thuna',
        	'weddingdate'=>'',
        	'role_id'=>'1',
        	'remember_me'=>'',
        	'budget'=>'1'
	    )
	    );
    }
}
class LocationTableSeeder extends Seeder {

    public function run()
    {
        DB::table('location')->delete();

        location::create(array('name'=>'An Giang'));
        location::create(array('name'=>'Bà Rịa-Vũng Tàu'));
        location::create(array('name'=>'Bạc Liêu'));
        location::create(array('name'=>'Bắc Cạn'));
        location::create(array('name'=>'Bắc Giang'));
        location::create(array('name'=>'Bắc Ninh'));
        location::create(array('name'=>'Bến Tre'));
        location::create(array('name'=>'Bình Dương'));
        location::create(array('name'=>'Bình Định'));
        location::create(array('name'=>'Bình Phước'));
        location::create(array('name'=>'Bình Thuận'));
        location::create(array('name'=>'Cà Mau'));
        location::create(array('name'=>'Cao Bằng'));
        location::create(array('name'=>'Cần Thơ(TP)'));
        location::create(array('name'=>'Đà Nẵng(TP)'));
        location::create(array('name'=>'Đắk Lắk'));
        location::create(array('name'=>' Đắk Nông'));
        location::create(array('name'=>'Điện Biên'));
        location::create(array('name'=>'Đồng Nai'));
        location::create(array('name'=>'Đồng Tháp'));
        location::create(array('name'=>'Gia Lai'));
        location::create(array('name'=>'Hà Giang'));
        location::create(array('name'=>'Hà Nam'));
        location::create(array('name'=>'Hà Nội(TP)'));
        location::create(array('name'=>'Hà Tây'));
        location::create(array('name'=>'Hà Tĩnh'));
        location::create(array('name'=>'Hải Dương'));
        location::create(array('name'=>'Hải Phòng(TP)'));
        location::create(array('name'=>'Hòa Bình'));
        location::create(array('name'=>'Hồ Chí Minh(TP)'));
        location::create(array('name'=>'Hậu Giang'));
        location::create(array('name'=>'Hưng Yên'));
        location::create(array('name'=>'Khánh Hòa'));
        location::create(array('name'=>'Kiên Giang'));
        location::create(array('name'=>'Kon Tum'));
        location::create(array('name'=>'Lai Châu'));
        location::create(array('name'=>'Lào Cai'));
        location::create(array('name'=>'Lạng Sơn'));
        location::create(array('name'=>'Lâm Đồng'));
        location::create(array('name'=>'Long An'));
        location::create(array('name'=>'Nam Định'));
        location::create(array('name'=>'Nghệ An'));
        location::create(array('name'=>'Ninh Bình'));
        location::create(array('name'=>'Ninh Thuận'));
        location::create(array('name'=>'Phú Thọ'));
        location::create(array('name'=>'Phú Yên'));
        location::create(array('name'=>'Quảng Bình'));
        location::create(array('name'=>'Quảng Nam'));
        location::create(array('name'=>'Quảng Ngãi'));
        location::create(array('name'=>'Quảng Ninh'));
        location::create(array('name'=>'Quảng Trị'));
        location::create(array('name'=>'Sóc Trăng'));
        location::create(array('name'=>'Sơn La'));
        location::create(array('name'=>'Tây Ninh'));
        location::create(array('name'=>'Thái Bình'));
        location::create(array('name'=>'Thái Nguyên'));
        location::create(array('name'=>'Thanh Hóa'));
        location::create(array('name'=>'Thừa Thiên-Huế'));
        location::create(array('name'=>'Tiền Giang'));
        location::create(array('name'=>'Trà Vinh'));
        location::create(array('name'=>'Tuyên Quang'));
        location::create(array('name'=>'Vĩnh Long'));
        location::create(array('name'=>'Vĩnh Phúc'));
        location::create(array('name'=>'Yên Bái'));
    }

}
class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        Category::create(array(
        	'name'=>'Áo cưới cô dâu',
        	'description'=>'',
        	'range1'=>0.08,
        	'range2'=>0.08,
        	'range3'=>0.08,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'dress.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Ban nhạc',
        	'description'=>'',
        	'range1'=>0.02,
        	'range2'=>0.02,
        	'range3'=>0.03,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'band.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Bánh cưới',
        	'description'=>'',
        	'range1'=>0,
        	'range2'=>0.01,
        	'range3'=>0.01,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'cake.png'
	    )
	    );
	    Category::create(array(
        	'name'=>'Dịch vụ vận chuyển',
        	'description'=>'',
        	'range1'=>0,
        	'range2'=>0,
        	'range3'=>0.02,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'transportation.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Trang điểm',
        	'description'=>'',
        	'range1'=>0.04,
        	'range2'=>0.03,
        	'range3'=>0.03,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'makeup.png'
	    )
	    );
	    Category::create(array(
        	'name'=>'Wedding Planner',
        	'description'=>'',
        	'range1'=>'',
        	'range2'=>'',
        	'range3'=>'',
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'weddingplanner.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Nhà hàng tiệc cưới',
        	'description'=>'',
        	'range1'=>0.58,
        	'range2'=>0.52,
        	'range3'=>0.48,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'venue.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Chụp ảnh',
        	'description'=>'',
        	'range1'=>0.08,
        	'range2'=>0.1,
        	'range3'=>0.07,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'photography.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Thiệp cưới',
        	'description'=>'',
        	'range1'=>0.02,
        	'range2'=>0.02,
        	'range3'=>0.02,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'invitations.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Trang phục chú rể',
        	'description'=>'',
        	'range1'=>0.02,
        	'range2'=>0.02,
        	'range3'=>0.02,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'dress.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Hoa và trang trí',
        	'description'=>'',
        	'range1'=>0.1,
        	'range2'=>0.1,
        	'range3'=>0.12,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'florist.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Ca sĩ/MC',
        	'description'=>'',
        	'range1'=>0,
        	'range2'=>0.02,
        	'range3'=>0.02,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'music.png'
	    )
	    );
	    Category::create(array(
        	'name'=>'Quay phim',
        	'description'=>'',
        	'range1'=>0.06,
        	'range2'=>0.08,
        	'range3'=>0.08,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'videography.svg'
	    )
	    );
	    Category::create(array(
        	'name'=>'Khác',
        	'description'=>'',
        	'range1'=>0,
        	'range2'=>0,
        	'range3'=>0.02,
        	'range4'=>'',
        	'range5'=>'',
            'images'=>'other.svg'
	    )
	    );
    }
}

class VendorTableSeeder extends Seeder {

    public function run()
    {
        DB::table('vendors')->delete();

        for ($i = 0; $i < 10; $i++)
        {
          $vendor = Vendor::create(array(
            'name' => 'Monte Cristo Ballroom',
            'address' => '1507 Wall Street' ,
            'phone' => 099966654,
            'website' => 'thuna.vn',
            'email' => 'info@montecristoballroom.com',
            'avatar' => '',
            'about' => "The Monte Cristo Ballroom is an all-inclusive chef-owned wedding and event venue in downtown Everett, WA. This historic building, originally a hotel build in the late 1800's, provides a stunning, elegant ambiance for any special occasion. At the Monte Cristo Ballroom, we strive to create a relaxed experience for you on your special day.",
            'album' => 1,
            'video' => '<iframe width="560" height="315" src="//www.youtube.com/embed/dHOEGpEesFQ" frameborder="0" allowfullscreen></iframe>',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d26081603.29442047!2d-95.677068!3d37.0625!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1405651963057" width="600" height="450" frameborder="0" style="border:0"></iframe>',
            'category' => 1,
            'location' => 1

          ));
        }
        for ($i = 0; $i < 10; $i++)
        {
          $vendor = Vendor::create(array(
            'name' => 'Lord Hill Farms',
            'address' => '1507 Wall Street' ,
            'phone' => 099966654,
            'website' => 'thuna.vn',
            'email' => 'info@montecristoballroom.com',
            'avatar' => '',
            'about' => "The Monte Cristo Ballroom is an all-inclusive chef-owned wedding and event venue in downtown Everett, WA. This historic building, originally a hotel build in the late 1800's, provides a stunning, elegant ambiance for any special occasion. At the Monte Cristo Ballroom, we strive to create a relaxed experience for you on your special day.",
            'album' => 2,
            'video' => '<iframe width="560" height="315" src="//www.youtube.com/embed/dHOEGpEesFQ" frameborder="0" allowfullscreen></iframe>',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d26081603.29442047!2d-95.677068!3d37.0625!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1405651963057" width="600" height="450" frameborder="0" style="border:0"></iframe>',
            'category' => 2,
            'location' => 1

          ));
        }
        for ($i = 0; $i < 10; $i++)
        {
          $vendor = Vendor::create(array(
            'name' => 'Belle Chapel',
            'address' => '1507 Wall Street' ,
            'phone' => 099966654,
            'website' => 'thuna.vn',
            'email' => 'info@montecristoballroom.com',
            'avatar' => '',
            'about' => "The Monte Cristo Ballroom is an all-inclusive chef-owned wedding and event venue in downtown Everett, WA. This historic building, originally a hotel build in the late 1800's, provides a stunning, elegant ambiance for any special occasion. At the Monte Cristo Ballroom, we strive to create a relaxed experience for you on your special day.",
            'album' => 3,
            'video' => '<iframe width="560" height="315" src="//www.youtube.com/embed/dHOEGpEesFQ" frameborder="0" allowfullscreen></iframe>',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d26081603.29442047!2d-95.677068!3d37.0625!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1405651963057" width="600" height="450" frameborder="0" style="border:0"></iframe>',
            'category' => 3,
            'location' => 1

          ));
        }
        for ($i = 0; $i < 10; $i++)
        {
          $vendor = Vendor::create(array(
            'name' => 'Pickering Barn',
            'address' => '1507 Wall Street' ,
            'phone' => 099966654,
            'website' => 'thuna.vn',
            'email' => 'info@montecristoballroom.com',
            'avatar' => '',
            'about' => "The Monte Cristo Ballroom is an all-inclusive chef-owned wedding and event venue in downtown Everett, WA. This historic building, originally a hotel build in the late 1800's, provides a stunning, elegant ambiance for any special occasion. At the Monte Cristo Ballroom, we strive to create a relaxed experience for you on your special day.",
            'album' => 4,
            'video' => '<iframe width="560" height="315" src="//www.youtube.com/embed/dHOEGpEesFQ" frameborder="0" allowfullscreen></iframe>',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d26081603.29442047!2d-95.677068!3d37.0625!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1405651963057" width="600" height="450" frameborder="0" style="border:0"></iframe>',
            'category' => 4,
            'location' => 2

          ));
        }
    }
}
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'admin@gmail.com',
            'password'=>Hash::make('123456'),
            'firstname'=>'nguyen',
            'lastname'=>'thuna',
            'weddingdate'=>'',
            'role_id'=>'1',
            'remember_me'=>'',
            'budget'=>'1'
        )
        );
    }
}