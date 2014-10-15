
<?php
	class TaskTableSeeder extends Seeder {

    public function run()
    {
        DB::table('task')->delete();


Task::create(array(
            'title' => 'Cùng nhau chọn ngày cưới','description' => 'Chọn ngày tốt trong năm mà bạn muốn cưới, phù hợp với tuổi tác và công việc của cả hai bạn.','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên kế hoạch với một danh sách các công việc cần chuẩn bị cho đám cưới.','description' => 'Ngay lúc này, bạn nên tạo hẳn 1 folder trong email và mua ngay một bìa kẹp để lưu trữ những thứ liên quan đến đám cưới. Hãy dùng công cụ lập kế hoạch của Marry để được hỗ trợ tối đa công việc','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Sắp xếp hai gia đình gặp gỡ nhau.','description' => 'Đây là lúc bạn nên để cả hai bên gia đình cùng trao đổi về đám cưới, về ngân sách cưới ai lo khoản nào.','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Thiết lập ngân sách và tính toán chi phí cho đám cưới','description' => 'Với công cụ Tính tóan ngân sách trên MarryWedding, bạn sẽ không phải lo lắng quá nhiều cho việc này, dù đây là một việc rất quan trọng khi chuẩn bị đám cưới.','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm ngay một người điều phối cho đám cưới của bạn','description' => 'Nếu bạn không thể tự chuẩn bị hoặc tổ chức đám cưới của mình, bạn nên tìm ngay một người điều phối cho đám cưới của bạn (Weddingplanner)','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Xác định được tone màu cho đám cưới','description' => 'Bạn muốn có một đám cưới với màu chủ đạo là gì? Phong cách đám cưới ra làm sao? Bạn hãy chọn màu và Marry cho bạn thấy những hình ảnh thật đẹp về đám cưới đúng màu sắc bạn đã chọn lựa.','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chuẩn bị sửa sang nhà cửa nếu cần','description' => 'Làm mới ngôi nhà chào đón sự kiện trọng đại hoặc chỉ sửa sang phòng tân hôn.','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên kế hoạch giữ dáng đẹp cho đám cưới','description' => 'Lên kế hoạch giữ dáng đẹp cho đám cưới bằng cách tham khảo các bài viết về giảm cân và làm đẹp, thực hiện chế độ ăn uống và tập thể thao','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm mẫu váy cưới mà bạn muốn','description' => 'Bắt đầu tìm kiếm mẫu váy cưới mà bạn mơ ước trên mạng online hoặc hỏi qua bạn bè, sách báo','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn ra người thích hợp và tiến hành ký hợp đồng thuê wedding planner','description' => 'Sau khi tìm kiếm người điều phối, bạn nên chọn ra người thích hợp và tiến hành ký hợp đồng thuê wedding planner. Điều quan trọng là người đó phải làm việc ăn ý với bạn','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo va tìm kiếm các địa điểm, nhà hàng tổ chức đám cưới','description' => 'Tham khảo va tìm kiếm các địa điểm, nhà hàng tổ chức đám cưới qua mạng online, sách báo và những người xung quanh (nơi bạn đang sinh sống)','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm kiếm dịch vụ nấu tiệc tại nhà','description' => 'Nếu bạn tổ chức đám cưới ờ nhà, bạn nên bắt đầu tìm kiếm dịch vụ nấu tiệc cho mình bằng cách tham khảo qua mạng hoặc hỏi kinh nghiệm bạn bè đã cưới','category' => '1',
        	'startdate'=>'361', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên kế hoạch cho tiệc đính hôn','description' => 'Nếu bạn muốn có một buổi tiệc đính hôn, bạn nên lên kế hoạch ngay từ bây giờ. Chọn ngày giờ, địa điểm và số người tham dự để mọi thứ thật hoàn hảo.', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo và tìm kiếm những địa điểm tổ chức đám cưới ở xa (trong nước hoặc ngoài nước)','description' => 'Nếu bạn muốn tổ chức đám cưới ở một nơi khác nơi bạn đang sống hoặc ở nước ngoài, kết hợp du lịch thì bạn cần tìm kiếm các địa điểm tổ chức trên mạng hoặc hỏi bạn bè.', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đã đến lúc bạn cần lên danh sách khách mời cho cả hai bên gia đình','description' => 'Sử dụng quản lý danh sách khách mời của MarryWedding để làm điều này. Bắt đầu với gia đình và bạn bè, sau đó chuyển sang phần còn lại của người được mời theo thứ tự tầm quan trọng.', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Hãy suy ghĩ bạn có cần một đội phù dâu không và chọn lựa đội phù dâu như ý muốn','description' => 'Bạn bè và đồng nghiệp thân thiết sẽ là đội hình phù dâu phù rể thích hợp nhất cho bạn. Đội phù dâu cũng có thể là đội hình bưng quả hoặc khác nhau.', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo và lựa chọn thực đơn cho tiệc cưới','description' => 'Hãy chọn 1 thực đơn hợp lý và ngon miệng dành cho khách mời nhưng không lãng phí. Thực đơn luôn đảm bảo ít nhất là 5 món chính và 1 món tráng miệng.', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tiến hành chọn 1 tone màu chủ đạo cho đám cưới','description' => 'Sau khi đã tìm hiểu và tham khảo về màu sắc chủ đạo của đám cưới, bạn nên chọn 1 màu cho mình', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chốt lại danh sách khách mời tham dự đám cưới  (lần thứ 1)','description' => 'Tính toán sơ lượt số khách mời ban đẩu để tính toán những việc liên quan như chi phí, số bàn…', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên danh sách những điều cấm kỵ trong phong tục cưới truyền thống để tránh bị mắc lỗi','description' => 'Phong tục cưới xin các vùng miền khác nhau, việc tìm hiểu sẽ giúp tránh những lỗi không mong muốn', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo một số các địa chỉ làm đẹp cho cô dâu','description' => 'Việc làm đẹp đối với các cô dâu rất quan trọng, bạn nên tìm kiếm các địa chỉ đáng tin cậy', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Sau khi tìm được các studio áo cưới ưng ý, bạn nên dạo quanh 1 vòng để thử thật nhiều mẫu váy cưới.','description' => 'Thử nhiều mẫu váy cưới mà bạn muốn để chọn ra mẫu ưng ý nhất. Khi đi thử nhớ đi chung với một người thân như mẹ hoặc bạn thân để lấy ý kiến.', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm kiếm các dịch vụ trang trí nhà cửa mà bạn mong muốn','description' => 'Thuê dịch vụ trang trí nhà cửa sẽ giúp bạn tiết kiệm thời gian tự làm và có được không gian thật đẹp cho ngày cưới', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm kiếm các nhóm nhảy hoặc DJ mà bạn yêu thích.','description' => 'Thông thường mục này nhà hàng hoặc địa điểm cưới luôn có cho bạn nhưng nếu muốn có phong cách riêng, bạn nên chọn riêng nhóm nhảy hoặc DJ cho mình.', 'category' => '1',
        	'startdate'=>'360', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo va chọn nhiếp ảnh cùng người quay phim cho đám cưới','description' => 'Đây là những nhân vật quan trọng giúp ghi lại khoảnh khắc đáng nhớ, bạn nên lựa chọn thật kỹ về khả năng, phong cách và cả sự hợp ý với bạn. Nên thử gặp gỡ để tiếp xúc và tìm hiểu ban đầu.', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm kiếm ý tưởng và mẫu thiệp cưới theo ý muốn của bạn','description' => 'Tham khảo các mẫu thiệp cưới của bạn bè đã cưới hoặc tìm kiếm trên mạng online', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm và tham khảo các địa chỉ hoa cưới trên mạng và hỏi bạn bè','description' => 'Tìm kiếm các shop hoa có mẫu mã đẹp, hoa tươi và nhiều chủng loại, giá cả phải chăng, dịch vụ tốt', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm kiếm ban nhạc mà bạn thích và đi nghe thử', 'description' =>'Đi nghe thử một số ban nhạc xem phong cách họ trình diễn và nghe các ca khúc để chọn lựa theo ý bạn muốn.', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm thợ làm tóc và chuyên gia trang điểm cho phong cách của bạn','description' => 'Có một số chuyên viên trang điểm làm tóc cưới luôn, nhưng một số khác thì không, vì vậy bạn cần chọn người mà bạn thấy hợp với mình.', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm và tham khảo các thương hiệu cùng các mẫu bánh cưới đẹp trên Marry.vn, hỏi thăm bạn bè','description' => 'Nếu bạn muốn có phong cách riêng cho đám cưới thì việc tự chọn mẫu bánh cưới theo ý thích là tốt nhất. Nếu tiết kiệm thì bạn nên sử dụng bánh nhà hàng tặng khi đặt tiệc. Nếu chọn bánh bên ngoài bạn nên ăn thử vài loại khác nhau trước khi đưa ra quyết định', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lựa chọn trang phục cho phù dâu sau khi đã chọn được đội hình phù dâu thích hợp','description' => 'Trang phục là phần giúp làm nổi bật đội hình phù dâu của bạn. Đặc biệt cần chú ý tính đồng bộ cho phong cách chung của đám cưới. Nhớ lưu lại những mẫu váy phù dâu mà bạn thấy đẹp và ưng ý trước khi đi may/mua/thuê', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo các công ty du lịch trăng mật về giá tour, nội dung tour, phong cách phục vụ','description' => 'Có rất nhiều các công ty du lịch với dịch vụ và giá cả khác nhau, bạn cũng cần phải tìm hiểu và chọn lựa để có được dịch vụ tốt nhất.', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm kiếm địa điểm cho tuần trăng mật','description' => 'Bạn nên tìm các điạ điểm du lịch nổi tiếng mà bạn muốn đến để chuẩn bị cho tuần trăng mật. Bạn chọn ra 3-5 địa điểm ưng ý nhất trước khi chọn cái cuối cùng.', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Bạn nên tiến hành làm hợp đồng và may váy cưới vào thời điểm này','description' => 'Nếu bạn chọn may váy cưới, sau khi có được mẫu váy như ý bạn nên tiến hành làm hợp đồng và may váy cưới vào thời điểm này. Nhớ lưu ý kỹ các điều khoản torng hợp đồng.', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Bắt đầu chuẩn bị nội dung và chọn mẫu mã, kiểu dáng, màu sắc cho thiệp cưới của bạn','description' => 'Bạn nên đi đến các địa chỉ in và thiết kế thiệp cưới để xem catalogue của họ và chọn mẫu thiệp cưới', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Gửi mẫu váy cho các phù dâu thử qua','description' => 'Bạn nên gửi mẫu váy đã chọn cho các phù dâu thử qua để điều chỉnh kích cỡ cho vừa vặn với từng người. Hoặc nếu không có thời gian, bạn chỉ cần lấy số đo của họ để đi mua/may/thuê váy.,', 'category' => '1',
        	'startdate'=>'330', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên danh sách những món cần phải thuê cho đám cưới','description' => 'Đám cưới cũng có rất nhiều thứ cần phải thuê ngoài  (vd: cổng hoa, xe hoa, bàn ghế…), nếu không làm một danh sách cụ thể, bạn sẽ dễ bị bỏ sót.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo hợp đồng và giá cả với dịch vụ cung cấp hoa cưới','description' => 'Bạn yêu cầu đơn vị thực hiện hoa cưới gửi cho bạn bảng báo giá, thông tin dịch vụ và nội dung hợp đồng để xem trước và cân nhắc.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tiến hành đặt in thiệp cưới','description' => 'Sau khi chọn được mẫu thiệp cới vừa ý, bạn nên đặt in luôn với số lượng trừ hao so với số lượng khách mời dự kiến bạn đang có. Mức trừ hao dao động từ 10-50 tùy theo mỗi người.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Bạn nên tìm hiểu qua các nghi thức cưới đặc biệt theo tôn giáo','description' => 'Nếu bạn tổ chức đám cưới trong Nhà Thờ hoặc trong Chùa, bạn nên tìm hiểu qua các nghi thức đặc biệt theo tôn giáo','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm người làm chủ hôn cho đám cưới của bạn','description' => 'Người làm chủ hôn là nhân vật quan trọng của đám cưới, sẽ đại diện cho hai bên gia đình. Vì vậy bạn không được bỏ sót nhân vật này khi đám cưới.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm người viết thiệp cưới đẹp nếu bạn thấy cần thiết','description' => 'Viết thiệp cưới sao cho thật đẹp, thật trang trọng khiến rất nhiều cô dâu chú rể lo lắng vì sợ chữ không đẹp. Tìm một người viết giúp cũng là một giải pháp.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn trang phục cho chú rể phụ','description' => 'Trang phục cho chú rể phụ cần hài hòa với đội hình dâu phụ và cả với ahi nhân vật chính. Có thể là áo dài, áo vest hoặc áo sơ mi trắng..','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn đội hình phụ rể','description' => 'Chú rể cũng nên chọn cho mình một đội hình phù rể tương xứng từ bạn bè và đồng nghiệp. Đặc biệt nên tham khảo qua đội hình phù dâu để tìm phù rể thích hợp. Đội hình dâu rể phụ sẽ đẹp hơn torng ngày cưới.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham gia học lớp giáo lý hôn nhân nếu bạn là người có đạo','description' => 'Đây là điều kiện bắt buộc phải có nếu bạn là người theo đạo và muốn đám cưới trong nhà thờ.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Bạn nên đặt 1 phòng tân hôn sau đám cưới để tận hưởng không gian riêng.','description' => 'Nếu bạn cưới ở khách sạn, bạn nên đặt luôn 1 phòng tân hôn cho đêm tân hôn được diễn ra lãng mạn, riêng biệt. Bạn cần lưu ý  là nếu bạn tổ chức cưới tại khách sạn, bạn có thể sẽ được tặng 1 phòng tân hôn miễn phí.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn trang phục cho chú rể','description' => 'Tùy theo tính chất của sự kiện (đám cưới hay đám hỏi) và phong cách (truyền thống hoặc hiện đại) mà chú rể sẽ chọn veston hay áo dài khăn đóng hoặc trang phục khác theo sở thích.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Sau khi tham khảo địa điểm và giá cả, bạn cần tiến hành đặt tour du lịch trăng mật, vé máy bay, phòng KS','description' => 'Khi đặt tour bạn nhớ xem kỹ các chi tiết trong hợp đồng và dịch vụ cần có, kèm theo là bảo hiểm du lịch.','category' => '1',
        	'startdate'=>'300', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn phụ kiện cho các cô dâu phụ','description' => 'Nếu có điều kiện, ngoài váy áo bạn nên chọn thêm phụ kiện đồng bộ cho cô dâu phụ như hoa cầm tay hay hoa cài áo, giày, găng, kẹp tóc…', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chuẩn bị lời thề ước cho nghi lễ cưới trong nhà thờ','description' => 'Việc này sẽ có người hướng dẫn khi bạn them gia lớp học giáo lý và khi làm lễ cưới tại nhà thờ.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên ý tưởng và chuẩn bị cho phần mở màn của cô dâu chú rể trong đám cưới: trình diễn 1 ca khúc, 1 điệu nhảy…','description' => 'Phần mở màn của cô dâu chú rể torng mỗi tiệc cưới là quan trọng và ấn tượng nhất, vì vậy bạn nên lên một ý tưởng độc đáo và mới lạ.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Mua sắm một số vật dụng trang trí cho đám cưới (ở nhà)','description' => 'Bạn thuê dịch vụ trang trí nhà cửa, nhưng bạn cũng sẽ thích tự tay mua sắm một vài món trang trí cho nhà của mình trong ngày cưới như hoa, tranh ảnh, nến…', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo và chọn trang sức cưới','description' => 'Thông thường trang sức cưới bao gồm: vòng cổ, vòng tay, hoa tai là những thứ căn bản nhất sẽ do mẹ chồng và mẹ cô dâu trao tặng. Tuy nhiên ngày nay cô dâu thường sẽ được đi cùng mẹ chú rể hoặc mẹ mình để chọn những món yêu thích.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tiến hành làm hợp đồng đặt cọc nhà hàng, nơi tổ chức tiệc cưới để giữ ngày','description' => 'Khi đã có ngày giờ cho đám cưới và chọn được nhà hàng ưng ý, bạn nên đặt cọc để giữ chỗ. Thông thường việc này phải trước 6 tháng. Có những nơi quá đông bạn phãi đặt chỗ trước từ 1 năm.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chốt thực đơn cưới với bên nhà hàng (lần 1)','description' => 'Khi đặt cọc giữ ngày tại nhà hàng,  bạn sẽ phải tiến hàng đặt thực đơn cưới để họ tính gói dịch vụ ban đầu với con số cụ thể, giúp bạn chuẩn bị ngân sách cho khoản này.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chú rể đi thử trang phục','description' => 'Chú rể cũng cần đi thử trang phục để chỉnh sửa cho vừa vặn với dáng người.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo và chọn quà tặng cảm ơn cho khách mời tham dự đám cưới của bạn','description' => 'Bạn có thể chọn hình thức tự mua hay tự làm quà tặng cá ơn khách mời hoặc dùng gói khuyến mãi quà tặng của nhà hàng tổ chức tiệc cưới khi đặt bàn số lượng nhiều.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn kiểu áo dài mà bạn muốn','description' => 'Chọn kiểu dáng, màu sắc.loại vải mà bạn muốn mặc. Có thể tham khảo sự tư vấn thêm từ nhà may mà bạn đã chọn.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Cô dâu chọn váy lót và nội y','description' => 'Đây là những phụ kiện không thể thiếu của cô dâu và sẽ giúp cô dâu đẹp hơn, tự tin hơn khi diện váy cưới.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo và chọn nhà may áo dài cưới đẹp tại Tp HCM và các nơi khác','description' => 'Có rất nhiều địa chỉ may áo dài tại Tp HCM. Bạn cần tìm cho mình một địa chỉ may đẹp mà giá thành vừa phải.', 'category' => '1',
        	'startdate'=>'270', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm hiểu và chuẩn bị các thứ cần mang theo trong tuần trăng mật','description' => 'Để cho chuến trăng mật ngọt ngào và suôn sẻ, bạn cần tìm hiểu kỹ những khâu có liên quan như việc chuẩn bị hành lý là khá quan trọng.', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi lấy thiệp cưới sau khi đã in xong','description' => 'Khi đi lấy thiệp cưới đã in xong bạn cần kiểm tra nội dung, màu sắc, kích thước có in đúng theo yêu cầu của bạn hay không. Số lượng giao có đủ không? Và cả chất liệu có đúng cái bạn chọn hay không!', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi mua vải và đi may áo dài cưới','description' => 'Sau khi chọn xong các khâu chuẩn bị bạn còn chờ gì mà không đi mua vải và may áo dài ngay lập tức!', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chốt lại danh sách các bản nhạc sẽ phát trong đám cưới của bạn','description' => 'Đây là các bản nhạc sẽ phát trong lúc cô dâu chú rể đứng đón khách tại nhà hàng. Hoặc nếu bạn không thích có ban nhạc trình diễn ồn ào thì những bản nhạc này sẽ phát suốt tiệc cưới.', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo các địa điểm chụp ảnh cưới','description' => 'Có rất nhiều địa điểm chụp ảnh cưới đẹp tại Việt Nam. Vấn đề là bạn chọn theo ý thích, phong cách ảnh cưới và ngân sách của chính mình.', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi nhận váy cưới và chỉnh sửa (lần 1)','description' => 'Đã đến lúc bạn đi xem chiếc váy cưới đặt may trông ra sao và cần chỉnh sửa thế nào cho hoàn chỉnh.', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo các mẫu nhẫn cưới và các thương hiệu nhẫn cưới uy tín', 'description' =>'Hãy cùng chú rể đi ngắm nhìn và tham khảo các mẫu nhẫn cưới đẹp của các thương hiệu trong và ngoài nước', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi chọn mua phụ kiện cho chú rể','description' => 'Phụ kiện của chú rể bao gồm: hoa cài áo, cravat, nơ bướm, khăn choàng, giày và găng tay...', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi chụp ảnh cưới','description' => 'Sau khi có nhiếp ảnh, địa điểm thì bạn nên đi chụp ảnh cưới thôi!', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn và mua trang phục cho bố mẹ hai bên gia đình','description' => 'Bạn có thể tự đi mua và trao tặng hoặc cũng có thể cùng chồng tương lai dắt bố mẹ hai bên đi mua sắm trang phục', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Nếu bạn tổ chức đám cưới ở xa, nên chuẩn bị và thu xếp thời gian, địa điểm và chỗ nghỉ ngơi cho sự có mặt của gia đình hai bên','description' => 'Đây là việc khá bận rộn cho bạn đấy. Chuẩn bị chỗ nghỉ ngơi và lo chuyện ăn uống cho bà con họ hàng người thân đếgiúpm tham dự đám cưới khá vất vả. Bạn có thể nhờ thêm người phụ giúp.', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tạo một folder riêng ghi ra các chương trình cho nghi lễ cưới, bao gồm: khách mời, người phát biểu, lời chúc phúc…để dễ dàng kiểm soát','description' => 'Nghi lễ cưới diễn raa tại nhà là một sự kiện quan trọng vì vậy bạn cần nắm rõ chương trình trước để không bị mắc lỗi hay thiếu sót vào ngày cưới diễn ra', 'category' => '1',
        	'startdate'=>'240',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo và chọn MC mà bạn muốn có mặt trong lễ cưới','description' => 'Tại các nhà hàng tổ chức tiệc cưới họ sẽ có MC đám cưới dành cho bạn, nhưng bạn cũng có thể tìm MC riêng mà mình yêu thích để dẫn chương trình.', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đặt nhẫn cưới hoặc mua ngay sau khi có mẫu ưng ý, nhờ khắc tên và ngày cưới trên nhẫn','description' => 'Khi có mẫu nhẫn cưới ưng ý, hai bạn nên mua ngay và yêu cầu người bán khắc tên và ngày cưới hoặc biểu tượng mà các ban yêu thích lên nhẫn.', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi thử váy cưới lần 2, xác định loại phụ kiện sẽ đi cùng váy cưới mà bạn đã chọn','description' => 'Sau khi váy cưới chỉnh sửa hoàm thiện, bạn nên đi thử lần nữa cho chắc và từ đó chọn luôn phụ kiện đi kèm thích hợp.', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham gia lớp học tiền hôn nhân','description' => 'Lớp học tiền hôn nhân là nơi sẽ cung cấp cho bạn những kiến thức cần thiết để sau khi kết hôn bạn sẽ không phải ngỡ ngàng khi sảy ra sự cố hôn nhân.', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm hiểu và chuẩn bị giấy tờ cần thiết cho việc đăng ký kết hôn','description' => 'Trước khi đăng ký kết hôn bạn cần phải chuẩn bị giấy tờ thông tin cá nhân thật đầy đủ, đặc biệt là giấy chứng nhận độc thân,', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi đăng ký kết hôn','description' => 'Việc đăng ký kết hôn sẽ diễn ra tại UBND phường/xã nơi cô dâu hoặc chú rể sinh sống và có hộ khẩu thường trú.', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn quà cảm ơn cho cô dâu và chú rể phụ','description' => 'Người châu á có phong tục tặng bao lì xì cho đội hình dâu rể phụ như là một sự tượng trưng cho lời cảm ơn và cũng là hình thức ''trả duyên'' cho cô dâu phụ tránh bị mất duyên theo tục lệ', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Quyết định về sổ ký tên khách mời là loại hình nào: truyền thống, tranh in vân tay, ký tên trên ảnh cưới…', 'description' =>'Phong cách đám cưới hiện đại ngày càng có thêm nhiều cách thức mới lạ và hấp dẫn, hình thức tranh kỳ tên cũng là một trong sổ đó, giúp tạo dấu ấn riêng cho đám cưới của bạn', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Trang điểm và làm tóc thử trước ngày cưới để lựa chọn phong cách phù hợp nhất cho bạn','description' => 'Nếu bạn sợ ngày cưới sẽ không được xinh đẹp như ý hoặc bị trang điểm quá lố, việc trang điểm và làm tóc thử sẽ giúp bạn chọn lựa và điều chỉnh', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn tấm ảnh đẹp nhất để làm ảnh lớn trong khu vực đón khách vào ngày cưới','description' => 'Đây là bức ảnh sẽ được trưng bày ngay sảnh đón khách vì vậy bạn cần chọn bức ảnh đẹp cho cả hai người và giúp khách mời dễ dàng nhận diện cô dâu chú rề khi sảnh có quá nhiều đám cưới', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo các video clip cưới trên internet hoặc của bạn bè','description' => 'Trên mạng internet có rất nhiều những video clip cưới với nhiều phong cách khác nhau: vui nhộn, trả trung, truyền thống...bạn hãy tham khảo và chọn 1 phong cách mà bạn muốn thực hiện', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Thống nhất nội dung và số lượng mâm quả cho đám hỏi và đám cưới (nếu bạn hỏi cưới riêng)','description' => 'Số lượng mâm quả và nội dung bên trong là điều hai gia đình cần bàn bạc và thống nhất cụ thể để tránh những việc không như ý', 'category' => '1',
        	'startdate'=>'210',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Dành thời gian chọn ra những kiểu ảnh cưới ưng ý để làm album cưới','description' => 'Để có một album cưới đẹp bạn nê là người tự chọn những bức ảnh cưới ưng ý sau khi chụp, nhưng nhớ lưu ý số lượng ảnh sao cho vừa đủ album, không qua ít hay quá nhiều.', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi khám sức khỏe nếu thấy việc đó là cần thiết','description' => 'Không phải ai cũng đi khám sức khỏe trước khi cưới nhưng đây là việc bạn nên làm, nhất là với những ai kết hôn với người nước ngoài.', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi lấy giấy đăng ký kết hôn', 'description' =>'Đã tới ngày hẹn lấy giấy đăng ký kết hôn, bạn đã lấy chưa? Bạn nhớ kiểm tra các thông tin trên tờ giấy chứng nhận kết hôn xem đã chính xác hay chưa', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chuẩn bị quà tặng và ghi note cảm ơn khách mời nếu bạn tự chuẩn bị quà cảm ơn','description' => 'Nếu bạn chọn việc tự chuẩn bị quà tặng cảm ơn khách mời dự đám cưới thì bạn nên bắt đầu chuẩn bị và không quên đính kèm lời cảm ơn vào mỗi món quà', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Làm việc với ban nhạc mà bạn đã chọn sẽ chơi trong ngày cưới về các bài nhạc và ca sĩ (có thể có hoặc không) mà bạn muốn nghe','description' => 'Khi đã chọn được ban nhạc như ý muốn, bạn cần thảo luận với họ về ý muốn và yêu cầu của bạn thật rõ ràng để họ làm theo', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi lấy nhẫn cưới','description' => 'Hẹn ngày giờ cùng chú rể đi lấy nhẫn cưới sau khi đã hoàn thiện. Nhớ kiểm tra kích cỡ, màu sắc, kiểu dáng và trọng lượng có đúng như yêu cầu của bạn không', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo các mẫu cổng hoa','description' => 'Tham khảo các mẫu cổng hoa đẹp với nhiều kiểu dáng, chất liệu khác nhau trên mạng online, sách báo', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo các mẫu trang trí nhà cửa, bàn thờ cho lễ cưới','description' => 'Gặp gỡ các nhà cung cấp dịch vụ trang trí nhà cửa để tham khảo các mẫu trang trí đẹp trên catalogue của họ. Hoặc bạn có thể tham khảo qua mạng', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Xác nhận lại thông tin đã đặt phòng tân hôn và tour trăng mật với các bên dịch vụ','description' => 'Bạn đừng quên việc xác nhận lại thông tin với các bên dịch vụ trăng mật sau khi đặt để tránh những sai sót hay trục trặc không mong muốn khi đi trăng mật', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chốt con số khách mời tương đối cho nhà hàng đãi tiệc cưới để đặt bàn dự phòng','description' => 'Đây là thời điểm bạn chốt số lượng khách mời chính xác để đặt bàn dự phòng với bên nhà hàng tiệc cưới', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chuẩn bị mẫu backdrop mà bạn mong muốn, yêu cầu địa điểm tổ chức cưới thực hiện hoặc bạn tự thực hiện bên ngoài','description' => 'Bạn tìm kiếm các mẫu backdrop đẹp trên mạng hay sách báo, gửi cho đơn vị tổ chức trang trí tiệc cưới. Hoặc bạn cũng có thể tự làm backdrop theo ý thích.', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tham khảo các mẫu xe hoa','description' => 'Tham khảo các mẫu xe hoa đẹp nhất, mới nhất trên mạng online, sách báo', 'category' => '1',
        	'startdate'=>'180',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Cô dâu tập đi trên đôi giày cưới của mình','description' => 'Để việc đi lại trên đôi giày mới không gặp trở ngại trong ngày cưới, cô dâu nên tập đi để làm quen trước với đôi giày mới mua', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Gửi mail thông báo cho đội hình dâu rể phụ về các công việc cần làm, thời gian, địa điểm và những điều cần lưu ý','description' => 'Để công việc được phối hợp nhịp nhàng, bạn cần thông báo rõ ràng những công việc phải làm, thời gian và địa điểm có mặt cho đội hình dâu rể phụ trước ngày cưới', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên danh sách khách mời và thời gian cho buổi ăn thử bàn tiệc cưới tại nhà hàng','description' => 'Chọn những người thân nhất hai bên gia đình để cùng cô dâu chú rể tham dự ăn thử bàn tiệc cưới để đánh giá thực đơn cưới đã chọn, điều chỉnh theo ý muốn. Thông báo ngày giờ sẽ đến ăn thử với bên nhà hàng.', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn và phân công người sẽ ngồi bàn reception cho lễ cưới tại nhà hàng', 'description' =>'Chọn những cô em gái, cháu gái xinh xắn sẽ là những gương mặt đại diện ngồi bàn reception  để chào đón khách mời tham dự đám cưới', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Cô dâu đi mua giày cưới','description' => 'Đi mua và chọn lựa giày cưới khá quan trọng. Bạn phải chọn được đôi giày đẹp nhưng không gây đau chân trong suốt buổi tiệc', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Làm hợp đồng thuê xe hoa, xe đưa đón khách mời','description' => 'Nếu bạn đã chọn được các mẫu xe ưng ý, dịch vụ cho thuê xe giá cả phải chăng, bạn nên tiến hành làm hợp đồng thuê', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Phân công người thân hoặc bạn thân là người sẽ quản lý theo dõi toàn bộ công việc khi lễ cưới được diễn ra','description' => 'Bạn cần có một người thay thế bạn nắm rõ toàn bộ chương trình tiệc cưới để điều phối. Có thể là bạn thân hoặc đồng nghiệp hoặc người thân gia đình.', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Thuê cổng hoa','description' => 'Sau khi chọn được mẫu cổng hoa vừa ý, bạn cũng nên tiến hành làm hợp đồng thuê cổng hoa, lưu ý ngày giờ địa điểm bên dịch vụ giao hàng và ngày giờ trả hàng.', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm hiểu các rắc rối có thể xảy ra trong ngày cưới, chuẩn bị những phương án đối phó','description' => 'Có rất nhiều các sự việc phát sinh trong lễ cưới, vì vậy tham khảo kinh nghiệm của các bạn đã cưới để nắm rõ tình hình và tự chuẩn bị những phương án đối phó nếu xảy ra', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chuẩn bị gối để nhẫn và người sẽ giữ nhẫn cưới khi làm lễ','description' => 'Đây là dành cho lễ cưới tại nhà thờ (Chùa) hoặc nghi lễ vào hôm rước dâu', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Phân công người sẽ coi sóc thùng tiền cưới, người sẽ cầm tiền và lo các thủ tục chi trả trong lễ cưới','description' => 'Bạn cũng cần có một người đáng tin cậy để quản lý thùng tiền mừng đám cưới, cũng như chuẩn bị sẵn tiền để thanh toán, chi trả sau đám cưới', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi spa và làm đẹp, thư giãn','description' => 'Trong khi làm mọi việc cho đám cưới, cô dâu vẫn không được quên việc làm đẹp là tối cần thiết và rất quan trọng. Bạn nên đi spa để chăm sóc da, giúp thư giãn và giảm stress', 'category' => '1',
        	'startdate'=>'150',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên danh sách các việc còn chưa làm xong để tiện theo dõi','description' => 'Đây là thời điểm bạn cần kiểm tra lại mọi thứ trong suốt quá trình chuẩn bị cưới. Cái gì đã làm và cái gì chưa làm để kịp điều chỉnh và sắp xếp', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tiến hành đặt bánh cưới', 'description' =>'Sau khi cân nhắc và chọn lựa, bạn hãy đặt bánh cưới và hoa cưới, nhớ nêu rõ yêu cầu cụ thể cũng như hẹn ngày giao chính xác.', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Ước tính sơ số lượng khách mời sẽ có mặt để bố trí sơ đồ chỗ ngồi','description' => 'Dựa trên số lượng khách mời đang dự kiến, bạn sắp xếp sơ đồ chỗ ngồi sao cho hợp lý, người quen được ngồi gần nhau cũng như tránh tình trạng bàn bị trống nhiều chỗ', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn trang phục cho phù dâu nhí','description' => 'Để đội hình phù dâu nhí của bạn đẹp hơn, bạn nên chọn đồng phục cho các bé thay vì để các bé tự mặc. Các trang phục này cần phối hợp hài hòa giữa bé gái và bé trai cùng với trang phục của cô dâu chú rể.', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Kiểm tra và chắc chắn rằng phù dâu phù rể sẽ mang theo trang phục và phụ kiện của họ đến lễ cưới đúnhg thời điểm','description' => 'Gọi điện thoại hoặc email cho đội hình dâu rể phụ để kiểm tra lần nữa việc họ nắm chắc lịch trình và thời gian diễn ra lễ cưới cũng như không bỏ sót trang phục hay phụ kiện', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Xác định số lượng và con người cụ thể cho đội hình phù dâu nhí','description' => 'Thông thường đội hình phù dâu nhí khoảng 2-4 bé là đẹp. Cách nhanh nhất để tìm phù dâu nhí là chọn các bé trong chính gia đình', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn bài múa mở màn cho nghi lễ cưới tại nhà hàng','description' => 'Nhà hàng tổ chức tiệc cưới sẽ có một số tiết mục mở màn cho bạn lựa chọn, hoặc bạn cũng có thể tự chọn nhóm múa yêu thích bên ngoài và bài múa cũng là bài mà bạn chọn', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lập bảng ngân sách thu chi tính tới thời điểm hiện tại','description' => 'Sau một khoản thời gian đã chi khá nhiều, bạn cần hạch toán lại để nắm rõ đã chi những gì và bao nhiêu. Từ đó bạn sẽ có những bước tính tiếp theo phù hợp.', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Suy nghĩ về việc có nên chọn phù dâu nhí','description' => 'Bạn muốn có sự mới lạ, nét dễ thương đáng yêu cho đám cưới, bạn nên tìm các cô bé cậu bé làm phù dâu phù rể thay vì tìm người lớn.', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chốt thực đơn và số lượng bàn với nhóm nấu hoặc nhà hàng cho bữa ăn trưa','description' => 'Sau khi làm lễ rước dâu ở nhà, bạn nê có một buổi tiệc trưa dành cho người thân và quý quan khách. Thực đơn không cần quá cầu kỳ nhưng cũng phải đủ 5 món. Số lượng bàn trung bình từ 3-5 bàn.', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tiếp xúc, làm quen và mô tả công việc cho các phù dâu nhí','description' => 'Đối với các phù dâu nhí việc sẽ không đơn giản chỉ là đưa ra yêu cầu công việc. Bạn cần làm quen và tạo sự gần gũi để các bé tin tưởng và yêu thích, sau đó mới chỉ bảo công việc. Đặc biệt khi có phù dâu nhí thì nên cần có một người quản lý riêng cho đội h', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đặt nhóm nấu hoặc nhà hàng cho buổi ăn trưa sau khi rước dâu','description' => 'Bạn có thể đặt bàn ở nhà hàng và mời mọi người ra nhà hàng sau khi làm lễ rước dâu. Hoặc nếu có không gian rộng thoáng bạn cũng có thể đặt nấu tại nhà cho ấm cúng. Hãy chọn nhóm nấu nào mà bạn đã từng ăn qua và thấy ngon, hợp vệ sinh.', 'category' => '1',
        	'startdate'=>'120', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Mua sắm một số vật dụng trang trí cho đám cưới(ở xa)','description' => 'Bạn thuê dịch vụ trang trí nhà cửa, nhưng bạn cũng sẽ thích tự tay mua sắm một vài món trang trí cho nhà của mình trong ngày cưới như hoa, tranh ảnh, nến…', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tìm hiểu các kinh nghiệm làm dâu, kinh nghiệm sống chung với gia đình chồng','description' => 'Học hỏi kinh nghiệm sống từ mẹ, người thân quen hay bạn bè đã cưới sẽ giúp bạn biết cách ứng xử hợp lý những ngày đầu mới cưới', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Trao đổi về quyền và nghĩa vụ của hai vợ chồng sau khi cưới','description' => 'Một cuộc nói chuyện giữa hai vợ chồng trước ngày cưới là rất quan trọng. Chia sẻ tâm tư, suy nghĩ cho quá trình chuẩn bị cưới và cả sau cưới để thấu hiểu giúp cuộc sống tốt đẹp hơn', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chuẩn bị bài phát biểu trong đám cưới','description' => 'Bái phát biểu trong đám cưới có thể do cha mẹ cô dâu, cha mẹ chú rể hoặc chính cô dâu chú rể phát biểu. Thông thường là lời cám ơn và chia sẻ chân thành gửi đến song thân và quý quan khách', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Mua sắm vật dụng trang trí cho phòng tân hôn','description' => 'Bạn không đặt phòng tân hôn tại khách sạn mà sử dụng ngay chính căn phòng tại nhà dành cho hai vợ chồng, bạn nên trang trí cho thật lãng mạn để làm tăng thêm không khí. Nếu không biết làm cách nào, bạn có thề tham khảo trước hình mẫu trên MarryWedding nhé', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi mua quà cho mẹ chồng','description' => 'Sau khi làm lễ rước dâu ở nhà, bạn nên có một buổi tiệc trưa dành cho người thân và quý quan khách. Thực đơn không cần quá cầu kỳ nhưng cũng phải đủ 5 món. Số lượng bàn trung bình từ 3-5 bàn.', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Gửi một bản copy hành trình trăng mật cho người thân để dự phòng những trường hợp khẩn cấp','description' => 'Đây là điều cần thiết đề phòng những bất trắc có thể xảy ra khi bạn đi du lịch, người thân vẫn có thể hỗ trợ khi cần như: thất lạc đồ, giấy tờ…', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Kiểm duyệt clip mở màn lần cuối','description' => 'Clip mở màn cho tiệc cưới đã xong, bạn cần xem lại để chắc rằng hình ảnh đẹp, nội dung độc đáo, âm thanh rõ ràng và đĩa không bị trục trặc gì', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tiến hành đặt mâm quả, mua sắm lễ vật cần có; trầu cau, đèn, trà rượu','description' => 'Liên lạc với dịch vụ cho thuê mâm quả mà bạn đa chọn để đặt mâm quả, trầu cau, trà rượu và hẹn ngày giờ giao đến tận nhà. Có một số gia đình chỉ thuê mâm quả và tự mua lễ vật cho vào, một số còn lại thì thuê và đặt hàng lễ vật tại nhà cung cấp  luôn.', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn đội hình bưng quả từ bạn bè hoặc thuê qua dịch vụ cưới','description' => 'Một đội hình từ khoảng 7-8 người. Bạn cò thể chọn nhớ từ bạn bè và đồng nghiệp, lưu ý là ngoại hình phải tương xứng nhau. Nhanh hơn là bạn có thể thuê qua dịch vụ với giá từ 100,000 VND/người.', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Trao đổi với người làm chủ hôn lần chót về các nghi thức trong lễ cưới','description' => 'Để chắc chắc mọi việc tiến hành như ý muốn, bạn nên trao đổi kỹ với người làm chủ hôn về các nghi thức trong lễ cưới trước khi diễn ra.', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi cắt tóc lần cuối cùng nếu cần thiết','description' => 'Bạn muốn thay đổi ngoại hình, làm mới vẻ bề ngoài thì đây là thời hạn chót. Vì nếu để quá cận ngày cưới mà kết quả không như ý muốn thì sẽ làm ảnh hưởng đến vẻ đẹp và tinh thần của bạn.', 'category' => '1',
        	'startdate'=>'90',
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn người sẽ đi theo cô dâu, phụ cầm hoa, thay váy trong suốt tiệc cưới','description' => 'Nếu bạn không có cô dâu phụ, bạn cần có một người bạn hỗ trợ trong việc thay váy áo, dậm lại lớp trang điểm. Hoặc bạn cũng có thể thuê người trang điểm đi theo làm việc này và trả thêm chi phí.', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Thảo luận và thống nhất với nhiếp ảnh và người quay phim về số lượng ảnh chụp trong lễ cưới và nội dung quay','description' => 'Bạn muốn chụp những khoảnh khắc nào? Chụp bao nhiêu tấm hình? Bạn muốn quay phim lại như thế nào? Bạn cần phải làm việc rõ ràng với nhiếp ảnh và quay phim', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Thống nhất lần cuối với đơn vị tổ chức về khâu trang trí cho lễ cưới: sân khấu, nhóm múa, hoa tươi…','description' => 'Email, gọi điện hoặc gặp mặt đơn vị tổ chức, nhà hàng lần cuối bàn về các chi tiết trang trí lễ cưới', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn chú rể phụ nào sẽ đi theo tiếp khách', 'description' =>'Ở Việt Nam có nghi thức đi chào bàn, vì vậy bạn nên chọn 1 chú rể phụ đi theo để cùng chia sẻ trong việc tiếp khách mời, cụng ly….', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Gửi bản chương trình nghi lễ cưới ở nhà hàng cho những người lên quan','description' => 'Bạn cần in ra và giao bản ghi chương trình nghi lễ cho những nhân sự liên quan: quản lý nhà hàng, người chỉnh âm thanh, ánh sáng, MC … để họ nắm rõ những điều bạn muốn và thực hiện theo', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên kịch bản cho chương trình nghi lễ cưới ở nhà hàng','description' => 'Nếu bạn không có wedding planner, không sử dụng nghi lễ cưới theo cách nhà hàng dùng phổ biến mà muốn có dấu ấn riêng của mình, bạn nên tự lên kịch bản: MC nói cái gì? Mấy giờ bắt đầu, cái gì trước cái gì sau….', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lên lịch đi spa làm đẹp đều dặn cho những tuần sát cưới','description' => 'Việc giữ gìn vóc dáng và duy trì cân nặng là rất quan trọng để cô dâu thật sự đẹp hoàn hảo trong ngày cưới', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Viết thiệp mời đám cưới','description' =>'Cẩn thận dò từng tên trên danh sách khi viết thiệp mời để tránh sai sót hoặc thiếu. Và lưu ý những người có người yêu hoặc vơ con đi kèm.', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi ăn thử bàn tiệc cưới','description' => 'Với số lượng bàn đặt trên mức quy định của nhà hàng, bạn và gia đình sẽ có 1 bàn tiệc cưới ăn thử trước để thẩm định chất lượng và hình thức món ăn.', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chốt danh sách khách mời lần cuối cùng','description' => 'Đây là danh sách chính xác những người bạn quyết định sẽ gửi thiệp mời đám cưới.', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Gửi sơ đồ chỗ ngồi cho nơi tổ chức tiệc','description' => 'Bạn cần gửi sơ đồ chỗ ngồi bạn đã tự sắp xếp cho nơi tổ chức tiệc để họ thu xếp bàn và chỗ cho khách mời: số lượng, nhóm khách mời…', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Gửi thiệp báo hỷ cho những vị khách, người thân  ở xa','description' => 'Với những người thân hay bạn bè ở xa không dự tiệc cưới được, bạn nên gửi thiệp báo tin và trước từ 1 tháng đến tháng rưỡi, trừa hao thời gian vận chuyển.', 'category' => '1',
        	'startdate'=>'60', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chọn địa điểm và thời gian để tổ chức tiệc độc thân cho chàng','description' => 'Hãy dành cho chàng sự bất ngờ thích thú bằng chính buổi tiệc độc thân đáng nhớ do “nửa kia” của mình sắp đặt. Mọi thứ cần được bí mật tới phút chót để tăng sự hấp dẫn bạn nhé!', 'category' => '1',
        	'startdate'=>'30',

'link'=>'')
	    );

Task::create(array(
            'title' => 'Chốt lại thực đơn tiệc cưới lần cuối cùng','description' => 'Bạn làm việc với bên nhà hàng tổ chức tiệc cưới hoặc đơn vi6 nấu ăn (nếu tổ chức cưới tại nhà) về các món ăn trong thực đơn mà bạn quyết định sẽ phục vụ torng ngày cưới có thay đổi hay không so với ban đầu.', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Làm việc với người dẫn chương trình về kịch bản ngày cưới','description' => 'MC có vai trò khá quan trọng trong tiệc cưới, bởi đó là người dẫn dắt toàn bộ chương trình. Buổi tiệc diễn ra vui vẻ hay nhàm chán, buồn cười đều phụ thuộc một phần vào MC. Vì vậy, bạn cần làm việc cụ thể với người dẫn chương trình mà bạn đã chọn về kịch ', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Sắp xếp hành lý cho tuần trăng mật','description' => 'Lập một danh sách các món cần mang theo và tuần tự cho vào vali, lưu ý những món không thể thiếu: giấy tờ, điện thoại, thuốc, bản đồ hoặc địa chỉ…', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Thu xếp công việc gửi đơn xin nghỉ phép','description' => 'Để những ngày cuối cùng tập trung cho việc cưới hỏi, bạn nên thu xếp công việc tại công ty cũng như gửi đơn xin nghỉ phép cho ngày cưới và tuần trăng mật.', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đi thử váy cưới lần cuối cùng','description' => 'Đây là lần thử quan trọng nhất vì bạn sẽ phải cảm thấy chiếc áo thật hoàn hảo theo yêu cầu. Nếu có chỉnh sửa gì thì đây cũng là lần cuối. Lưu ý vấn đề cân nặng bản thân đế tránh tình trạng áo không vừa hay rộng vào ngày cưới.', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Check lại lần cuối số lượng khách mời bằng email của MarryWedding','description' => 'Sử dụng công cụ của MarryWedding để công việc chuẩn bị đám cưới của bạn thêm dễ dàng và đơn giản', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Gửi thiệp mời đám cưới cho bạn bè, đồng nghiệp','description' => 'Việc này cần thực hiện trễ nhất là trước 2 tuần. Bạn nên đi mời tận tay để thể hiện sự trân trọng. Ngoại trừ một số bạn bè đồng nghiệp thân thiết có thể mới qua điện thoại hay email', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Kiểm tra lần cuối với các dịch vụ về ngày giờ địa điểm, thay đổi thông tin nếu có','description' => 'Gọi điệm một lượt cho tất cả nhà cung cấp dịch vụ mà bạn đang sử dụng để chắc rằng không có gì thay đổi, cũng như cập nhật nếu có thay đổi.', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Hẹn thời gian trang điểm, thư giãn và làm đẹp','description' => 'Đây là lúc bạn cần hít thở sâu thư giãn và tận hưởng những giớ phút đặc biệt. Không nên lo lắng hay suy nghĩ nhiều torng lúc này. Chỉ cần trở thành cô dâu xinh đẹp là được.', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Lấy và cất giữ trang phục cưới, phụ kiện cưới','description' => 'Bạn chỉ nên lấy trước 1 ngày. Khi lấy nhớ kiểm tra trang phục và phụ kiện thật kỹ, tránh thiết sót. Trang phục mang về nhà cũng phải bảo quản thật cẩn thận.', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tổ chức tiệc độc thân','description' => 'Hãy cùng bạn bè tận hưởng phút giây tự do cuối cùng của chính bạn hoặc tổ chức tiệc cho chồng tương lai.', 'category' => '1',
        	'startdate'=>'30',  
'link'=>'')
	    );

Task::create(array(
            'title' => 'Chia sẻ ảnh cưới, kinh nghiệm trên MarryWedding','description' => 'Vào mục chia sẻ ảnh cưới để chia sẻ album cưới của bạn cho mọi người cùng xem và chia vui nhé !', 'category' => '2',
        	'startdate'=>'0', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Tận hưởng cuộc sống mới','description' => 'Tận hưởng những giây phút ngọt ngào nhất khi vừa kết hôn bằng những chuyến du lịch, những bữa ăn tối ngọt ngào', 'category' => '2',
        	'startdate'=>'0', 
'link'=>'')
	    );

Task::create(array(
            'title' => 'Đánh giá các nhà cung cấp dịch vụ mà bạn đã sử dụng','description' => 'Đây là việc cần thiết vì sự chia sẻ kinh nghiệm của bạn sẽ giúp cho các cặp đôi sắp cưới rất nhiều cũng như giúp các nhà cung cấp hoàn thiện tốt hơn. Hãy review ngay dưới những nhà cung cấp dịch vụ mà bạn đã sử dụng.', 'category' => '2',
        	'startdate'=>'0',
        	'link'=>'')
	    );


    }

}