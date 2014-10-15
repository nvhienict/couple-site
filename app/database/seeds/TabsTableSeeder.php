
<?php
class TabsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tabs')->delete();


Tab::create(array('type' => 'welcome','title' => 'Chào mừng','content' => 'Welcome To Our Wedding Website!','visiable' => '0','titlestyle' => '','video' => '','map' => ''),
Tab::create(array('type' => 'about','title' => 'Nói về chúng tôi','content' => '[Remember, not all your guests will know both you and your fiancé(e) equally well. Share information about yourself and your fiancé(e) including your hometowns, occupations and how you met!]','visiable' => '0','titlestyle' => '','video' => '','map' => ''),
Tab::create(array('type' => 'wedding','title' => 'Đám cưới','content' => '[Enter Ceremony Information]','visiable' => '0','titlestyle' => '','video' => '','map' => ''),
Tab::create(array('type' => 'traval','title' => 'Du lịch','content' => 'tổ chức du lịch như thế nào nhỉ?','visiable' => '0','titlestyle' => '','video' => '','map' => ''),
Tab::create(array('type' => 'register','title' => 'Đăng kí','content' => 'Đăng kí thành viên','visiable' => '1','titlestyle' => '','video' => '','map' => ''),
Tab::create(array('type' => 'album','title' => 'Album ảnh', 'Những hình của bạn và người ấy','visiable' => '0','titlestyle' => '','video' => '','map' => ''),
Tab::create(array('type' => 'contact','title' => 'Liên lạc','content' => 'Liên lạc','visiable' => '0', 'titlestyle' =>'','video' => '','map' => ''),
Tab::create(array('type' => 'guestbook','title' => 'Lời chúc','content' => 'những lời chúc đẹp, hay.....','visiable' => '0','titlestyle' => '','video' => '', 'map' =>''),
Tab::create(array('type' => 'love_story','title' => 'Câu chuyện tình','content' => 'Chúng mình yêu nhau được 2 năm trước khi đến đám cưới này...','visiable' => '0','titlestyle' => '', 'video' =>'', 'map' =>'');



    }
}

