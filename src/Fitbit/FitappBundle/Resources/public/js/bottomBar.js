$(function(){
    var path_dev = location.pathname.split("/")[4];
    var path = location.pathname.split("/")[2];

    console.log("path "+path);
    console.log("pathdev "+path_dev);
    if(path == 'objectives' || path_dev == 'objectives')
        $('.right').addClass('active');
    else
        $('.left').addClass('active');
})