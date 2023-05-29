<?php
//資料庫主機設定
    //主機位址(localhost是在本機端，業務上應該是網址)
    $db_host = 'localhost';
    //管理者帳號
    $db_username = 'root';
    //管理者密碼
    $db_password = '';
    //資料庫名稱
    $db_name = 'mydb';

//連線到資料庫(順序不可顛倒)
   $db_link = @new mysqli($db_host, $db_username, $db_password, $db_name );
   //偵測是否有連上資料庫
   if($db_link -> connect_error != ''){
        //失敗  //echo相當於document.write，在php要這樣寫
        echo '連線失敗';
   }else{
        //成功
        // echo '連線成功';
        $db_link->query("SET NAMES 'UTF8'");
   }
?>