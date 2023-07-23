$(document).ready(function () {
    $.ajax({
        url: "chartColumn",
        type: "GET",
        success: function (response) {
            chartAllTema(response.data_tema);
            chartTI(response.data_ti);
            chartSI(response.data_si);
        },
    });

    function chartAllTema(data_tema) {
        var jumlah_tema = [];
        var temaAll = [];
        for (var i in data_tema) {
            jumlah_tema.push(data_tema[i].jumlah_data);
        }
        for (var i in data_tema) {
            temaAll.push(data_tema[i].tema);
        }

        var options = {
            series: [
                {
                    data: jumlah_tema,
                },
            ],
            chart: {
                type: "bar",
                height: 380,
            },
            plotOptions: {
                bar: {
                    barHeight: "100%",
                    distributed: true,
                    horizontal: true,
                    dataLabels: {
                        position: "bottom",
                    },
                },
            },
            dataLabels: {
                enabled: true,
                textAnchor: "start",
                style: {
                    colors: ["#fff"],
                },
                formatter: function (val, opt) {
                    return (
                        opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                    );
                },
                offsetX: 0,
                dropShadow: {
                    enabled: true,
                },
            },
            stroke: {
                width: 1,
                colors: ["#fff"],
            },
            xaxis: {
                categories: temaAll,
            },
            yaxis: {
                labels: {
                    show: false,
                },
            },
            title: {
                text: "Skripsi Berdasarkan Tema",
                align: "center",
                floating: true,
            },

            tooltip: {
                theme: "dark",
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function () {
                            return "";
                        },
                    },
                },
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#chartTema"),
            options
        );
        chart.render();
    }
    function chartTI(dataTI) {
        var jumlah_ti = [];
        var tema = [];
        for (var i in dataTI) {
            jumlah_ti.push(dataTI[i].jumlah_data);
        }
        for (var i in dataTI) {
            tema.push(dataTI[i].tema);
        }

        var options = {
            series: jumlah_ti,
            chart: {
                type: "donut",
                width: "100%",
            },
            labels: tema,
            dataLabels: {
                enabled: true,
                formatter: function (val, { seriesIndex }) {
                    return chart.w.globals.series[seriesIndex]; // Menambahkan tanda persen pada setiap nilai data
                },
            },
            legend: {
                position: "bottom",
                verticalAlign: "top",
                containerMargin: {
                    left: 35,
                    right: 60,
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartTI"), options);
        chart.render();
    }
    function chartSI(dataSI) {
        var jumlah_si = [];
        var tema = [];
        for (var i in dataSI) {
            jumlah_si.push(dataSI[i].jumlah_data);
        }
        for (var i in dataSI) {
            tema.push(dataSI[i].tema);
        }
        var options = {
            series: jumlah_si,
            chart: {
                type: "donut",
                width: "100%",
            },
            legend: {
                position: "bottom",
                verticalAlign: "top",
                containerMargin: {
                    left: 35,
                    right: 60,
                },
            },
            labels: tema,
            dataLabels: {
                enabled: true,
                formatter: function (val, { seriesIndex }) {
                    return chart.w.globals.series[seriesIndex]; // Menambahkan tanda persen pada setiap nilai data
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartSI"), options);
        chart.render();
    }
});
