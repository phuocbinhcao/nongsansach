let listday = $("#container").attr("data-list-day");
listday = JSON.parse(listday);

let listMoneyMonth = $("#container").attr("data-money");
listMoneyMonth = JSON.parse(listMoneyMonth);

let listMoneyMonthDefault = $("#container").attr("data-money-default");
listMoneyMonthDefault = JSON.parse(listMoneyMonthDefault);

let listMoneyMonthProcess = $("#container").attr("data-money-process");
listMoneyMonthProcess = JSON.parse(listMoneyMonthProcess);

let listMoneyMonthCancel = $("#container").attr("data-money-cancel");
listMoneyMonthCancel = JSON.parse(listMoneyMonthCancel);


var chart = new Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Tổng doanh thu hàng ngày'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: listday
    },
    yAxis: {
        title: {
            text: ''
        },
        labels: {
            formatter: function () {
                return this.value + 'đ';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
            name: 'Đơn hàng đã giao',
            marker: {
                symbol: ''
            },
            data: listMoneyMonth

        },
        {
            name: 'Đơn hàng Tiếp nhận',
            marker: {
                symbol: ''
            },
            data: listMoneyMonthDefault

        },
        {
            name: 'Đơn hàng Đang giao',
            marker: {
                symbol: ''
            },
            data: listMoneyMonthProcess

        },
        {
            name: 'Đơn hàng Hủy',
            marker: {
                symbol: ''
            },
            data: listMoneyMonthCancel

        }
    ]
});
