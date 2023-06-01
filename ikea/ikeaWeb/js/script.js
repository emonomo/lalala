///jquery ui tabs
$(function(){
    $("#tabs").tabs();
});

  //交換下拉選單定位
  $(window).scroll(function () {
    if ($(this).scrollTop() == 0) {
        $('.dropdown-menu').css("bottom", "100%");
        $('.dropdown-menu').css("top", "auto");
    } else {
        $('.dropdown-menu').css("top", "100%");
        $('.dropdown-menu').css("bottom", "auto");
    }
//滾動至指定位置啟動動畫
    var h = $(window).height() - 450;

    if ($(this).scrollTop() > h) {
        $('#food_1').css("animation-name", "food_1");
        $('#food_2').css("animation-name", "food_2");
    }
});
lightbox.option({
    'wrapAround':true
});
