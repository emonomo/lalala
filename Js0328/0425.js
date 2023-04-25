
/*使用jQUERY的寫法*/
$(function(){
    //---宣告變數---
    //所有按鈕的部分
    var setFilter = $('#filterBtn');
    //取得篩選按鈕中的 a 元素
    var filterBtn = setFilter.find('a');
    //取得ALL按鈕
    var btnAll = $('.allItem');
    //取得所有圖片中的元素
    var setList = $('#filterList');
    //取得 li 的元素
    var filterList = setList.find('li');
    //取得篩選後 列表中的寬度
    var listWidth = filterList.outerWidth();

    /*---處理篩選後的結果--- */
    //篩選按鈕被左鍵一下時
    filterBtn.click(function(){  //(補充:這function會進行圖片動畫)
      //檢查是否被點選狀態，不是的話，才會進行以下圖片動畫
      //(這是在看這個選項鍵是否在被選取的狀態，因為如果有(active)，不會再進行第二次動畫，所以才說被點選狀態不會再進行)
      //NOT運算子(!) => 有變成沒有

      if(!($(this).hasClass('active'))){
        //目前被點選的按鈕類別保存起來給變數 filterClass
        //attr() => 尋找到指定屬性的值
        var filterClass = $(this).attr('class');
       
        //使用each() 方法 (是迴圈)，逐一取得對應類別的圖片
     filterList.each(function(){
          //檢查li中是否有被篩選的類別
         if($(this).hasClass(filterClass)){
            //有找到
            //顯示圖片
            // 1.調整寬度
            $(this).css({display:'block' }).stop().animate({width:listWidth},1500);
            // 2.調整圖片透明度
            //find('*') 方法，將所有的li停下來
            $(this).find('*').stop().animate({opacity:'1'},1500);
         }else{
            //沒找到
            //隱藏圖片(動畫 animate)
            $(this).find('*').stop().animate({opacity:'0'},1000);
            $(this).stop().animate({width:'0'},1000,function(){
                $(this).css({display:'none'});
            });
          }
        });
      //清除所有篩選上的 active 類別
      filterBtn.removeClass('active');
      //將目前的篩選按鈕加上 active 類別
      $(this).addClass('active');

      }
    });

    //全部顯示
    btnAll.click(function(){
      filterList.each(function(){
         $(this).css({display:'block'}).stop().animate({width:listWidth}, 1500);
         $(this).find('*').stop().animate({opacity:'1'}, 1500);
         // find('*') 在這是指找li裡的所有項目
      });

    });
    //
    btnAll.click();
    //題外話:  $('.food').click(); 指定特定類別當一進頁面(例如:food)的畫面
});