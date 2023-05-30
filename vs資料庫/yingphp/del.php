<?php   
    include("conn.php");
    // 按下修改按鈕時才會執行
    if(isset($_POST["action"])&&($_POST["action"]=="del")){

        $sql_query = "DELETE FROM students WHERE cID=?";

        $del_data = $db_link-> prepare($sql_query);
        $del_data -> bind_param("i", $_POST["strID"]);
        $del_data -> execute(); // 執行SQL
        // 關閉sql
        $del_data -> close();
        // 關閉資料庫
        $db_link -> close();
        // 重新導向data.php
        header('location:data.php');

    }
    // 找出要刪除的資料
    $sql_select = "SELECT cID, cName, cSex, cBirthday, cEmail, cPhone, cAddr FROM students WHERE cID = ?";
    $edit_data = $db_link-> prepare($sql_select);
    $edit_data -> bind_param("i", $_GET["sid"]); // 取得網址上的參數
    $edit_data -> execute(); // 執行SQL
    $edit_data -> bind_result($cid, $cname, $csex, $cbirthday, $cemail, $cphone, $caddr); // 取得資料給對應的變數
    $edit_data -> fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>刪除學生資料</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>座號</td>
                <td><?php echo $cid ?></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><?php echo $cname ?></td>
            </tr>
            <tr>
                <td>性別</td>
                <td>
                    <?php
                        if($csex == 'M'){
                            echo "男";
                        }else{
                            echo "女";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>生日</td>
                <td><?php echo $cbirthday ?></td>
            </tr>
            <tr>
                <td>信箱</td>
                <td><?php echo $cemail ?></td>
            </tr>
            <tr>
                <td>電話</td>
                <td><?php echo $cphone ?></td>
            </tr>
            <tr>
                <td>地址</td>
                <td><?php echo $caddr ?></td>
            </tr>
            <tr>
                <!-- colspan 跨欄合併 -->
                <td colspan="2" align = "center">
                    <!-- 隱藏欄位(防駭客)：功能 -->
                    <input type="hidden" name="action" value="del">
                    <!-- 隱藏欄位：座號 -->
                    <input name="strID" type="hidden" value="<?php echo $cid ?>">

                    <input type="submit" value="確認刪除">
                     <!-- onclick="window.history.back();"回上一頁window.可省略 -->
                    <input type="button" value="取消刪除" onclick="window.history.back();">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>