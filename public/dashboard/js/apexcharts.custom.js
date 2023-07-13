$.ajax({
    url: 'admin/statistical', // Đường dẫn đến endpoint API của Laravel
    method: 'GET',
    success: function(response) {
        // Xử lý dữ liệu trả về từ controller
        var months = response.map(function(item) {
            return item.month;
        });

        var ordersData = response.map(function(item) {
            return {
                x: item.month,
                y: item.total_orders
            };
        });

        var totalData = response.map(function(item) {
            return {
                x: item.month,
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
                height: 350,
                stacked: !1,
            columnWidth: "70%",
            zoom: {
                enabled: !0
            },
            toolbar: {
                show: !1
            },
            background: "transparent"
            },
                dataLabels: {
            enabled: !1
        },
        theme: {
            mode: colors.chartTheme
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    position: "bottom",
                    offsetX: -10,
                    offsetY: 0
                }
            }
        }],
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "40%",
                radius: 30,
                enableShades: !1,
                endingShape: "rounded"
            }
        },
        xaxis: {
            categories: months,
            axisBorder: {
                show: !1
            }
        },
        yaxis: {
            labels: {
                show: !0,
                trim: !1,
                offsetX: -10,
                minHeight: void 0,
                maxHeight: 120,
                style: {
                    colors: colors.mutedColor,
                    cssClass: "text-muted",
                    fontFamily: base.defaultFontFamily
                }
            }
        },
        legend: {
            position: "top",
            fontFamily: base.defaultFontFamily,
            fontWeight: 400,
            labels: {
                colors: colors.mutedColor,
                useSeriesColors: !1
            },
            markers: {
                width: 10,
                height: 10,
                strokeWidth: 0,
                strokeColor: "#fff",
                fillColors: [extend.primaryColor, extend.primaryColorLighter],
                radius: 6,
                customHTML: void 0,
                onClick: void 0,
                offsetX: 0,
                offsetY: 0
            },
            itemMargin: {
                horizontal: 10,
                vertical: 0
            },
            onItemClick: {
                toggleDataSeries: !0
            },
            onItemHover: {
                highlightDataSeries: !0
            }
        },
        fill: {
            opacity: 1,
            colors: [base.primaryColor, extend.primaryColorLighter]
        },
        grid: {
            show: !0,
            borderColor: colors.borderColor,
            strokeDashArray: 0,
            position: "back",
            xaxis: {
                lines: {
                    show: !1
                }
            },
            yaxis: {
                lines: {
                    show: !0
                }
            },
            row: {
                colors: void 0,
                opacity: .5
            },
            column: {
                colors: void 0,
                opacity: .5
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
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
