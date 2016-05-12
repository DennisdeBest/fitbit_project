/**
 * Created by dennisdebest on 12/05/16.
 */

var znapscroll = (function(w, d){
    // Enable strict mode
    'use strict';

    /* configure target classes for wrapper and children */
    var ZNAP    = 'znapscroll';
    var GALLERY = 'gallery';
    var BOX     = 'box';
    var H       = 'horizontal-gallery';
    /* no need to edit past this point */

    var isScrollSnapSupported = 'scrollSnapType' in document.documentElement.style ||
        'webkitScrollSnapType' in document.documentElement.style ||
        !('classList' in document.createElement('_'));
    // if browser already supports CSS scroll Snap Points, or it is too old:
    var nonPolyfillable = isScrollSnapSupported || !Element.prototype.addEventListener || !window.requestAnimationFrame;
    var scrolling = false;
    var raf = null;
    var timer = null;
    var ready   = false;

    var onready = function( fn ){
        document.addEventListener( 'readystatechange', function() {
            fn();
            ready = true;
        }, false);
    };

    var zcroll = function( obj, Duration, To, Dir, cb ) {
        scrolling = true;

        timer = new Date();
        raf = requestAnimationFrame(step);

        var Initial     = obj['scroll' + Dir],
            Distance    = Math.abs( Initial - To ),
            StepDistance= Distance / (Duration / 15);

        function step () {
            var From = obj['scroll' + Dir],
                distance    = Math.abs( From - To ),
                Direction   = (To - From > 0) ? 1 : -1,
                nextPosition= From + ( Direction * StepDistance );

            if ( distance > StepDistance && new Date() - timer < Duration) {
                raf = requestAnimationFrame(step);

                obj['scroll' + Dir] = nextPosition;
            }
            else {
                obj['scroll' + Dir] = To;
                cancelAnimationFrame( raf );
                raf = null;
                timer = null;
                cb();
            }
        }
    };

    var handler = function(){
        if( scrolling === true ) {
            return;
        }

        var $par = this,
            dir  = $par.classList.contains(H) ? 'Left' : 'Top',
            off  = $par.classList.contains(H) ? 'Width' : 'Height';

        $par.removeEventListener('scroll', handler, false);

        setTimeout(function(){
            var From      = $par['scroll' + dir],
                elmOff    = $par['offset' + off],
                newPage   = Math.round( From / elmOff),
                To        = newPage * elmOff;

            // snap to view, animated
            zcroll(
                $par,
                100,
                To,
                dir,
                function(){
                    scrolling = false;
                    $par.addEventListener('scroll', handler, false);
                }
            );
        }, 500);


    };

    var setup = function( obj ){
        var $obj = obj,
            $par = obj.parentElement,
            dir  = $par.classList.contains(H) ? 'Left' : 'Top',
            $chi = $obj.getElementsByClassName( BOX ),
            num  = $chi.length;

        $obj.style["overflow"] = "hidden";
        if(dir === 'Left') {
            $par.style["overflow-x"] = "auto";
            $obj.style.width = num * 100 + '%';

            for (var i = 0, LEN = $chi.length; i < LEN; i++) {
                $chi[i].style.width = 100 / num + '%';
            }
        }
        else {
            $par.style["overflow-y"] = "auto";
            $obj.style.height = num * 100 + '%';

            for (var i = 0, LEN = $chi.length; i < LEN; i++) {
                $chi[i].style.height = 100 / num + '%';
            }
        }

        // listen to scroll
        $par.addEventListener('scroll', handler, false);
    };

    var run = function(){
        var galleries = d.getElementsByClassName( GALLERY );
        for (var i = 0, LEN = galleries.length; i < LEN; i++) {
            if( !galleries[i].classList.contains(ZNAP) ) {
                galleries[i].classList.add( ZNAP );
                setup( galleries[i] );
            }
        }
    };

    var prepare = function(){
        if(nonPolyfillable) {
            return;
        }

        if( ready === true ) {
            run();
        }
        else {
            onready(function() {
                run();
            });
        }
    };

    var destroy = function( context ){
        if(nonPolyfillable) {
            return;
        }

        var elm  = ( context )? context : d;
        var ZNAPABLE = elm.getElementsByClassName( ZNAP );

        for (var LEN = ZNAPABLE.length, i = LEN - 1; i >= 0; i--) {
            var o = ZNAPABLE[i],
                p = o.parentElement;
            // remove class and event listener
            p.removeEventListener('scroll', handler, false);
            o.classList.remove( ZNAP );
        }
    };

    // explicitly make prepare/destroy public methods
    return {
        prepare : prepare,
        destroy: destroy
    };

}(window, window.document));

znapscroll.prepare();
$(function(){
    var path_dev = location.pathname.split("/")[4];
    var path = location.pathname.split("/")[1];
    if(path == 'objectives' || path_dev == 'objectives')
        $('.right').addClass('active');
    else
        $('.left').addClass('active');
})
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
            $.getJSON('http://hhbdx.fr/web/app_dev.php/'+title+'/'+period, function(data) {
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