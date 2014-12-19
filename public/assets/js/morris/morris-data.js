$(function() {

    // Morris.Area({
    //     element: 'morris-area-chart',
    //     data: [{
    //         period: '2010 Q1',
    //         iphone: 2666,
    //         ipad: null,
    //         itouch: 2647
    //     }, {
    //         period: '2010 Q2',
    //         iphone: 2778,
    //         ipad: 2294,
    //         itouch: 2441
    //     }, {
    //         period: '2010 Q3',
    //         iphone: 4912,
    //         ipad: 1969,
    //         itouch: 2501
    //     }, {
    //         period: '2010 Q4',
    //         iphone: 3767,
    //         ipad: 3597,
    //         itouch: 5689
    //     }, {
    //         period: '2011 Q1',
    //         iphone: 6810,
    //         ipad: 1914,
    //         itouch: 2293
    //     }, {
    //         period: '2011 Q2',
    //         iphone: 5670,
    //         ipad: 4293,
    //         itouch: 1881
    //     }, {
    //         period: '2011 Q3',
    //         iphone: 4820,
    //         ipad: 3795,
    //         itouch: 1588
    //     }, {
    //         period: '2011 Q4',
    //         iphone: 15073,
    //         ipad: 5967,
    //         itouch: 5175
    //     }, {
    //         period: '2012 Q1',
    //         iphone: 10687,
    //         ipad: 4460,
    //         itouch: 2028
    //     }, {
    //         period: '2012 Q2',
    //         iphone: 8432,
    //         ipad: 5713,
    //         itouch: 1791
    //     }],
    //     xkey: 'period',
    //     ykeys: ['iphone', 'ipad', 'itouch'],
    //     labels: ['iPhone', 'iPad', 'iPod Touch'],
    //     pointSize: 2,
    //     hideHover: 'auto',
    //     resize: true
    // });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Áo cưới cô dâu",
            value: 5
        }, {
            label: "Ban nhạc",
            value: 5
        }, {
            label: "Bánh cưới",
            value: 5
        }, {
            label: "Dịch vụ vận chuyển",
            value: 5
        }, {
            label: "Trang điểm",
            value: 5
        }, {
            label: "Wedding Planner",
            value: 5
        }, {
            label: "Nhà hàng tiệc cưới",
            value: 5
        }, {
            label: "Chụp ảnh",
            value: 5
        }, {
            label: "Thiệp cưới",
            value: 5
        }, {
            label: "Trang phục chú rể",
            value: 5
        }, {
            label: "Hoa và trang trí",
            value: 5
        }, {
            label: "Ca sĩ/MC",
            value: 5
        }, {
            label: "Quay phim",
            value: 5
        }, {
            label: "Khác",
            value: 5
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'Danh sách công việc',
            a: $('.task-do-not').text(),
            b: $('.task-did').text(),
            c: $('.task-over-do').text(),
            d: $('.task-to-do').text(),
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c', 'd'],
        labels: ['Việc chưa làm', 'Việc đã làm', 'Việc quá hạn', 'Việc cần làm'],
        hideHover: 'auto',
        resize: true
    });

    // Morris.Line({
    //     element: 'line-example',
    //     data: [
    //       {year: '2010', value: 20},
    //       {year: '2011', value: 10},
    //       {year: '2012', value: 5},
    //       {year: '2013', value: 2},
    //       {year: '2014', value: 20}
    //     ],
    //     xkey: 'year',
    //     ykeys: ['value'],
    //     labels: ['Value']
    //   });

});
