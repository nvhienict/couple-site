

<?php
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