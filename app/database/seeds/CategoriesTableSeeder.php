

<?php
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