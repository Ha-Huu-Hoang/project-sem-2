$.ajax({
    url: 'admin/statistical',
    method: 'GET',
    success: function(response) {
        var months = response.map(function(item) {
            return item.month + '/' + item.year;
        });

        var ordersData = response.map(function(item) {
            return {
                x: item.month + '/' + item.year,
                y: item.total_orders
            };
        });

        var totalData = response.map(function(item) {
            return {
                x: item.month + '/' + item.year,
                y: item.total_amount
            };
        });

        var options = {
            series: [{
                name: 'Orders',
                data: ordersData
            }, {
                name: 'Total',
                data: totalData
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: months,
            },
            yaxis: {
                title: {
                    text: 'Shop Runner'
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val, { seriesIndex, dataPointIndex }) {
                        if (seriesIndex === 0) {
                            return val.toString();
                        } else {
                            return "$" + val;
                        }
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#columnChart"), options);
        chart.render();
    },
    // error: function(error) {
    //     console.log(error);
    // }
});
