<?php
include("conn.php");


    //按下修改按鈕時才會執行
    if(isset($_POST["action"])&&($_POST["action"] == "edit")){

        $sql_query = "UPDATE students SET cName=?, cSex=?, cBirthday=?, cEmail=?, cPhone=?, cAddr=? WHERE cID=?"; 
        $edit_data = $db_link->prepare($sql_query);
        $edit_data -> bind_param('ssssssi', 
                    $_POST['strName'],
                    $_POST['strSex'],
                    $_POST['strBirthday'],
                    $_POST['strEmail'],
                    $_POST['strPhone'],
                    $_POST['strAddr'],
                    $_POST['strID']);
        $edit_data-> execute();
        $edit_data -> close();
        $db_link -> close();
        //重新導向主畫面 data.php
        header("Location:data.php");
    }

    //找出要修改的資料
        $sql_select = "SELECT cID,cName, cSex, cBirthday, cEmail, cPhone, cAddr FROM students WHERE cID = ?"; 
        $edit_data = $db_link->prepare($sql_select);
        $edit_data -> bind_param("i", $_GET['sid']);  //取得網址上的參數
        $edit_data-> execute();    //執行SQL
        $edit_data-> bind_result($cid, $cname, $csex, $cbirthday, $cemail, $cphone, $caddr);  //取得資料給對應的變數
        $edit_data -> fetch();


  
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
      <h1>修改學生資料</h1>
      <form action="" method="post">
          <table>
             <tr>
                <td>座號</td>
                <td><?php echo $cid ?></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="strName" value="<?php echo $cname ?>"></td>
            </tr>
            <tr>
                <td>性別</td>
                <td>
                    <input type="radio" name="strSex" id="" value="F" <?php if($csex == "F") echo "checked";?>>女 
                    <input type="radio" name="strSex" id="" value="M" <?php if($csex == "M") echo "checked";?>>男
                </td>
            </tr>
            <tr>
                <td>生日</td>
                <td>
                    <input type="date" name="strBirthday" id="" value="<?php echo $cbirthday ?>">
                </td>
            </tr>
            <tr>
                <td>信箱</td>
                <td>
                    <input type="email" name="strEmail" id="" value="<?php echo $cemail ?>">
                </td>
            </tr>
            <tr>
                <td>電話</td>
                <td>
                    <input type="text" name="strPhone" id="" value="<?php echo $cphone ?>">
                </td>
            </tr>
            <tr>
                <td>地址</td>
                <td>
                    <input type="text" name="strAddr" id="" value="<?php echo $caddr ?>">
                </td>
            </tr>
            <tr>
                <!-- 隱藏欄位 -->
                <td colspan="2" align="center">
                    <!--隱藏欄位: 功能  -->
                    <input type="hidden" name="action" value="edit">  
                     <!--隱藏欄位: 座號 -->
                    <input name="strID" type="hidden" value="<?php echo $cid ?>">  
                    <input type="submit" value="送出">
                    <input type="reset" value="重填">
                </td>
            </tr>
          </table>
      </form>
</body>
</html>