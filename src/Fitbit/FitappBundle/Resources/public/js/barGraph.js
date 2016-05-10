$(function() {
        var options = {
            chart: {
                type: 'bar',
                renderTo: 'barGraph'
            },
            xAxis: {
                categories: ['Activity']
            },
            yAxis: {
                min: 0
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'percent'
                }
            },
            series: [{
                name: 'Very Active',
                data: [344]
            }, {
                name: 'Active',
                data: [152]
            }, {
                name: 'Mobile',
                data: [4]
            }, {
                name: 'Sedentary',
                data: [463]
            }]
        };


        var chart = new Highcharts.Chart(options);

});