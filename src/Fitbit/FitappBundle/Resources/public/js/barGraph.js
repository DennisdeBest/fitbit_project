$(function() {
/*
    var options = {
        chart: {
            renderTo: 'barGraph',
            type: 'spline'
        },
        title: {
            text: 'Steps',
            x: -20 //center
        },
        xAxis: {
        },
        series: [{

        }]
    };

    var period = 'oneYear';

    $('.timePeriodButton').click(function(){
        period = $(this).attr('id');
        getData();
    });

    function getData(){
        $.getJSON('http://localhost/fitbit_project/web/app_dev.php/steps/'+period, function(data) {
            var categories= [];
            var values = [];

            $.each(data.data, function(k, v) {
                categories.push(k);
                values.push(v);
            });
            console.log(categories);
            console.log(values);
            options.series[0].data = values;

            options.xAxis.categories = categories;
            console.log(data);
            var chart = new Highcharts.Chart(options);
        });
    }

    getData();
*/
});