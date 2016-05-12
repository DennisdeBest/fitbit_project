$(function() {



    function renderGraph(name) {

        var graphName = name+'Graph';
        var title = name;

        var options = {
            chart: {
                renderTo: graphName,
                type: 'spline'
            }, title: {
                text: title
            },
            xAxis: {
            },
            series: [{
                name: title
            }]
        };

        var period = 'oneYear';

        $('.timePeriodButton').click(function(){
            period = $(this).attr('id');
            getData();
        });

        function getData(){
            $.getJSON('http://localhost/fitbit_project/web/app_dev.php/'+title+'/'+period, function(data) {
                var categories= [];
                var values = [];

                console.log(data);

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
    }

    renderGraph('steps');
    renderGraph('bmi');
    renderGraph('floors');
    renderGraph('weight');

    $('#oneYear').addClass('active');

    $('.timePeriodButton').click(function () {
        console.log("graphButton clicked");
        $('.timePeriodButton').removeClass('active');
        $(this).addClass('active');
    })


});