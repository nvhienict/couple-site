

<?php
class SongTableSeeder extends Seeder {

    public function run()
    {
        DB::table('songs')->delete();

Song::create(array('name' => '(Nice to Meet You) Anyway update','category' => '1','artist' => 'Gavin Degraw','genre' => '1','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => '<p>I don&#39;t want to get too close . I don&#39;t want to get too close . You see this isn&#39;t where my head is . If you knew me I&#39;m not like this . But I just found someone special . And that&#39;s really something special . If you knew me . Nice&'
    ),
Song::create(array('name' => 'A Love Idea','category' => '1','artist' => 'Mark Knopfler','genre' => 'Traditional','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/STlLJxLUHOg" frameborder="0" allowfullscreen></iframe>','lyric' => ''
    ),
Song::create(array('name' => 'Drunk in Love','category' => '1','artist' => 'Beyonce','genre' => 'Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>','lyric' => ''
    ),
Song::create(array('name' => '4Evermore','category' => '2','artist' => 'Anthony David Feat. Algebra & Phonte ','genre' => 'Contemporary, Hip Hop, Rhythm and Blues','link' => '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>','lyric' => '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin'
    ),
Song::create(array('name' => '10 best couples wedding song 2013','category' => '2','artist' => 'Anthony David Feat. Algebra & Phonte ','genre' => 'Contemporary, Hip Hop, Rhythm and Blues', 'link' =>'<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>','lyric' => '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin'
    ),
Song::create(array('name' => 'Top 20 Best Romantic Love Song','category' => '2','artist' => 'Anthony David Feat. Algebra & Phonte ','genre' => 'Contemporary, Hip Hop, Rhythm and Blues', 'link' =>'<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>','lyric' => '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin'
    ),
Song::create(array('name' => 'Take me to your heart','category' => '2','artist' => 'Anthony David Feat. Algebra & Phonte ','genre' => 'Contemporary, Hip Hop, Rhythm and Blues','link' => '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>','lyric' => '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin'
    ),
Song::create(array('name' => 'Drunk in Love','category' => '3','artist' => 'Beyonce','genre' => 'Rhythm and Blues','link' => '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>','lyric' => ''
    ),
Song::create(array('name' => 'Take me to your heart','category' => '3','artist' => 'Beyonce','genre' => 'Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>','lyric' => ''
    ),
Song::create(array('name' => 'Wedding','category' => '3','artist' => 'Beyonce','genre' => 'Rhythm and Blues','link' => '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>', 'lyric' =>'', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
Song::create(array('name' => 'My Love','category' => '3','artist' => 'Beyonce','genre' => 'Rhythm and Blues', '<iframe width="560" height="315" src="//www.youtube.com/embed/p1JPKLa-Ofc" frameborder="0" allowfullscreen></iframe>','lyric' => ''
    ),
Song::create(array('name' => '4Evermore','category' => '4','artist' => 'Anthony David Feat. Algebra & Phonte ','genre' => 'Contemporary, Hip Hop, Rhythm and Blues','link' => '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>','lyric' => '4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin'
    ),
Song::create(array('name' => 'Wedding','category' => '4','artist' => 'Anthony David Feat. Algebra & Phonte ','genre' => 'Contemporary, Hip Hop, Rhythm and Blues','link' => '<iframe width="560" height="315" src="//www.youtube.com/embed/zQDcJBrLcNQ" frameborder="0" allowfullscreen></iframe>', 'lyric' =>'4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shine .\r\nAnd there''s really no substitute .\r\n\r\n4evermore .\r\nForever''s a mighty long time .\r\nBut I really wanna spend it with you .\r\nI shine when you shin'
    ),
Song::create(array('name' => '(Nice to Meet You) Anyway','category' => '5', 'Gavin Degraw','genre' => 'Pop, Rock', 'link' =>'<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw'
    ),
Song::create(array('name' => '(Nice to Meet You) Anyway','category' => '5','artist' => 'Gavin Degraw','genre' => 'Pop, Rock','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw'
    ),
Song::create(array('name' => 'Wedding','category' => '6','artist' => 'Gavin Degraw','genre' => 'Pop, Rock','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw'
    ),
Song::create(array('name' => '(Nice to Meet You) Anyway','category' => '7','artist' => 'Gavin Degraw', 'genre' =>'Pop, Rock','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw'
    ),
Song::create(array('name' => '(Nice to Meet You) Anyway','category' => '7','artist' => 'Gavin Degraw','genre' => 'Pop, Rock','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw'
    ),
Song::create(array('name' => 'Wedding','category' => '8','artist' => 'Gavin Degraw','genre' => 'Pop, Rock','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw'
    ),
Song::create(array('name' => '(Nice to Meet You) Anyway','category' => '8','artist' => 'Gavin Degraw','genre' => 'Pop, Rock','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw'
    ),
Song::create(array('name' => '(Nice to Meet You) Anyway','category' => '9','artist' => 'Gavin Degraw','genre' => 'Pop, Rock','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw'
    ),
Song::create(array('name' => 'Wedding','category' => '1','artist' => 'Gavin Degraw','genre' => '1','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => '<p>I don&#39;t want to get too close . I don&#39;t want to get too close . You see this isn&#39;t where my head is . If you knew me I&#39;m not like this . But I just found someone special . And that&#39;s really something special . If you knew me . Nice '
    ),
Song::create(array('name' => '(Nice to Meet You) Anyway','category' => '10','artist' => 'Gavin Degraw','genre' => 'Pop, Rock','link' => '<iframe width="420" height="315" src="//www.youtube.com/embed/VItGF6mGMNE" frameborder="0" allowfullscreen></iframe>','lyric' => 'I don''t want to get too close .\r\nI don''t want to get too close .\r\nYou see this isn''t where my head is .\r\nIf you knew me I''m not like this .\r\nBut I just found someone special .\r\nAnd that''s really something special .\r\nIf you knew me .\r\nNice to meet you anyw')
	);


    }
}

