$(window).scroll(function(){
    //交換下拉選單定位
    if($(this).scrollTop() ==0 ){
       $('.dropdown-menu, .navbar-collapse').css('bottom','100%');
       $('.dropdown-menu, .navbar-collapse').css('top','auto');   
    }else{
        $('.dropdown-menu, .navbar-collapse').css('top','100%');
        $('.dropdown-menu, .navbar-collapse').css('bottom','auto');
    }
    //滾動至指定位置啟動動畫
    var h = $(window).height()-200;

    if($(this).scrollTop() > h){
        $('#food_1').css('animation-name','food_1');
        $('#food_2').css('animation-name','food_2');       
    }
});
   
