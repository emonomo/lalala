<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- php 中的流程控制 -->
    <!-- 條件控制
        if
        if...else
        if...elseif ...else
        switch => 不可以使用區間條件 ，通常會加上break
    -->
    <?php
        // $a = 60;
        // if($a >= 60){
        //     echo '及格';
        // }else{
        //     echo '不及格';
        // }

        //成績等級
        // 60-70 => 丙
        // 70-80 => 乙
        // 80-90 => 甲
        // 90-100 => 優
        // 60以下 => 不及格
        $a = 55;
        if($a<0 || $a>100){
            echo '重打數字';
        }else{
            if($a < 60){
                echo '不及格';
            }elseif($a >= 60 && $a <70){
                    echo '丙等';
            }elseif($a >= 70 && $a <80){
                echo '乙等';
            }elseif($a >= 80 && $a <90){
                echo '甲等';
            }elseif($a >= 90 && $a <=100){
                echo '優等';
            }
        }

        //月份對應
        $a = 2;
        switch($a){
            case 1:
                echo '一月';
                break;
            case 2:
                echo '二月';
                break;    
            case 3:
                echo '三月';
                break;   
            default:
                echo '月份不存在';
                break;   
        }

    ?>


    <!-- 迴圈
        while
        do...while
        for
        foreach
    -->
    <?php
        //while
            // $i = 1;
            // while($i <= 5){
            //    echo $i;
            //    $i++;
            // }
        
        //do while
            // $i = 1;
            // do{
            //    echo $i;
            //    $i++; 
            // }while($i <= 5);
        
        //for
            // for($i = 1; $i <= 5 ; $i++){
            //     echo $i;
            // }
    ?>

    <!-- 流程控制中 若要脫離、轉向或結束
        break
        continue
        goto => 跳轉
    -->
    <?php
       //1-10的基數
            //    for($i = 1; $i <= 10; $i++){
            //       if($i % 2 != 0){
            //         echo $i;
            //       }else{
            //         continue;  //跳過偶數後到大括號後再進行 /或是else這一段都不要寫也可以
            //       }
            //    }
    

        //一般寫法     
            $tot = 0;
            for($i=1 ; $i<10 ;$i++){
                if($i % 2 != 0){
                    $tot = $tot + $i;
                }
            }    
            echo '1-10的基數合 =>'.$tot;
        // goto => 跳轉  
            $i = 1;
            $tot = 0;
            gstart:
               if($i>10){
                goto gend;
               }
               if($i % 2 != 0){
                $tot = $tot + $i;
               }
               $i++;
               goto gstart;
            gend:
                echo '1-10的基數合 =>'.$tot;  

           
    ?>

</body>

</html>