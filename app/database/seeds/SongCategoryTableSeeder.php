
<?php
class SongCategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('song_categories')->delete();
        
SongCategory::create(array('name' => 'Mở đầu','description' => 'Chơi trước khi bắt đầu của nghi lễ.')),
SongCategory::create(array('name' => 'Đoàn rước','description' => 'Chơi trong khi khách đang ngồi và đoàn rước tiến vào.')),
SongCategory::create(array('name' => 'Nghi thức','description' => 'Thắp nến và các bài nhạc liên tục được chuyển đổi.')),
SongCategory::create(array('name' => 'Kết thúc','description' => 'Chơi trong khi khách quan trọng rời đi sau nghi lễ.')),
SongCategory::create(array('name' => 'Khai tiệc','description' => 'Dạo khúc nhạc nhẹ để chuẩn bị khai tiệc.')),
SongCategory::create(array('name' => 'Phát biểu','description' => 'Chia sẻ một ca khúc đặc biệt về người phát biểu.')),
SongCategory::create(array('name' => 'Cắt bánh','description' => 'Có thể chơi nhạc lộn xộn để tạo không khí tươi vui.')),
SongCategory::create(array('name' => 'Vào tiệc','description' => 'Có thể chơi nhạc sinh động hơn 1 chút.')),
SongCategory::create(array('name' => 'Chúc mừng','description' => 'Chơi nhạc sâu lắng để những lời chúc thêm ý nghĩa.')),
SongCategory::create(array('name' => 'Cuối tiệc','description' => 'Lưu lại và phát những bài hát tốt nhất trong buổi tiệc.');


    }
}

