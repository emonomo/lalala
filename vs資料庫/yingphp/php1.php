<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- PHP 中的流程控制 -->
    <!-- 條件控制
        if
        if...else
        if...elseif...else
        switch
    -->
    <?php
        // $a=60;
        // if($a>=60){
        //     echo '及格';
        // }else{
        //     echo '不及格';
        // }

        // 成績等級
        // 60-70(不含70) => 丙
        // 70-80(不含80) => 乙
        // 80-90(不含90) => 甲
        // 90-100 => 優
        // $a = 70;
        // if($a<0||$a>100){
        //     echo 'err';
        // }else{
        //     if($a<60 && $a>=0){
        //         echo '不及格';
        //     }elseif($a>=60 && $a<70){
        //         echo '丙';
        //     }elseif($a>=70 && $a<80){
        //         echo '乙';
        //     }elseif($a>=80 && $a<90){
        //         echo '甲';
        //     }elseif($a>=90 && $a<=100){
        //         echo '優';
        //     }
        // }

        // 月份對應
        // $a=1;
        // switch($a){
        //     case 1:
        //         echo '一月';
        //         break;
        //     case 2:
        //         echo '二月';
        //         break;
        //     case 3:
        //         echo '三月';
        //         break;
        //     case 4:
        //         echo '四月';
        //         break;
            
        //     case 5:
        //         echo '五月';
        //         break;
            
        //     default:
        //         echo '月份err';
        //         break;
                            
        //     }
    ?>

    <!-- 迴圈
        while
        do...while
        for
        foreach
    -->
    <?php
        // while
        // $i=1;
        // while($i <= 5){
        //     echo $i;
        //     $i++;
        // }

        // do...while
        // $i=1;
        // do{
        //     echo $i;
        //     $i++;
        // }
        // while($i <= 5);

        // for
        // for($i=1;$i<=5;$i++){
        //     echo $i;
        // }

        // foreach

    ?>

    <!-- 流程控制若要脫離、轉向或結束
        break
        continue
        goto =>跳轉
    -->
    <?php
        // 1-10的奇數
        // for($i=1;$i<=10;$i++){
        //     if($i %2!=0){
        //         echo $i;
        //     }else{
        //         //跳過(pass)
        //         continue;
        //     }
        // }

        // 一般寫法
        // $tot=0;
        // for($i=1;$i<=10;$i++){
        //     if($i %2!=0){
        //         $tot=$tot+$i;
        //     }
        // }
        // echo '1-10奇數合 => '.$tot;

        // goto =>跳轉
        $i = 1;
        $tot = 0;
        gostart:
            if($i>10){
                goto goend;
            }
            if($i %2!=0){
                $tot=$tot+$i;
            }
            $i++;
            goto gostart;
        goend:
            echo '1-10奇數合 => '.$tot;
    ?>
</body>

</html>