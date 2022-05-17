let dataOrder = $("#container2").attr('data-json');
dataOrder = JSON.parse(dataOrder);
console.log(dataOrder);

Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: dataOrder,
        // [{
        //     name: 'Hoàn thành',
        //     y: 61.41,
        //     sliced: true,
        //     selected: true
        // }, {
        //     name: 'Tiếp nhận',
        //     y: 11.84
        // }, {
        //     name: 'Đang giao',
        //     y: 10.85
        // }, {
        //     name: 'Hủy',
        //     y: 4.67
        // }]
    }]
});
