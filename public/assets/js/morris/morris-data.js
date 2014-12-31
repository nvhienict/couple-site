$(function() {


    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'Biểu đồ thống kê',
            a: $('.thong-ke-cong-viec').text(),
            b: $('.thong-ke-khach-moi').text(),
            c: $('.thong-ke-ngan-sach').text(),
            d: $('.thong-ke-website').text(),
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c', 'd'],
        labels: ['Danh Sách Công Việc', 'Danh Sách Khách Mời', 'Quản Lý Ngân Sách', 'Website Cưới'],
        hideHover: 'auto',
        resize: true
    });


});
