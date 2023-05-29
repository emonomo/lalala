<?php
  //檢查是否新增資料
    if(isset($_POST["action"])&&($_POST["action"] == "add")){
         //連線資料庫
         include("conn.php");
         //建立新增資料的指令
         $sql_query = 'insert into students (cName, cSex, cBirthday, cEmail, cPhone, cAddr) value (?,?,?,?,?,?)'; 
         $save_data = $db_link->prepare($sql_query);
         $save_data -> bind_param('ssssss', $_POST['strName'],$_POST['strSex'],$_POST['strBirthday'],$_POST['strEmail'],$_POST['strPhone'],$_POST['strAddr']);
     //執行SQL
     $save_data -> execute();
     //關閉SQL
     $save_data -> close();
     //關閉資料庫DB
     $db_link -> close();
      //重新導向data.php
      header('location:data.php');
   }
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
      <h1>新增學生資料</h1>
      <form action="" method="post">
          <table>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="strName"></td>
            </tr>
            <tr>
                <td>性別</td>
                <td>
                    <input type="radio" name="strSex" id="" value="M">男
                    <input type="radio" name="strSex" id="" value="F">女
                </td>
            </tr>
            <tr>
                <td>生日</td>
                <td>
                    <input type="date" name="strBirthday" id="">
                </td>
            </tr>
            <tr>
                <td>信箱</td>
                <td>
                    <input type="email" name="strEmail" id="">
                </td>
            </tr>
            <tr>
                <td>電話</td>
                <td>
                    <input type="text" name="strPhone" id="">
                </td>
            </tr>
            <tr>
                <td>地址</td>
                <td>
                    <input type="text" name="strAddr" id="">
                </td>
            </tr>
            <tr>
                <!-- 隱藏欄位 -->
                <td colspan="2" allign="center">
                    <input type="hidden" name="action" value="add">  
                    <input type="submit" value="送出">
                    <input type="reset" value="重填">
                </td>
            </tr>
          </table>
      </form>
</body>
</html>