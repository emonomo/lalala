function bannerSwitcher() {
    next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
    if (next.length) next.prop('checked', true);
    else $('.sec-1-input').first().prop('checked', true);
  }

  var bannerTimer = setInterval(bannerSwitcher, 5000);

  $('nav .controls label').click(function() {
    clearInterval(bannerTimer);
    bannerTimer = setInterval(bannerSwitcher, 5000)
  });



 $(document).ready(function () {
  //---漢堡按鈕---
    $('.hamburger').click(function () {
        $(this).toggleClass('is-active');
        $('.navigation').toggleClass('show');
    }); 

    //---按鈕按下就跳轉指定的區塊---
    $(".menu a").click(function(){
      var btn = $(this).attr("href");//return取得屬性與值
      var pos = $(btn).offset();//抓取相對座標位置
      $("html,body").animate({scrollTop:pos.top},1500);//最後面的(1000是一秒)(1500為1.5秒)
    });
});

