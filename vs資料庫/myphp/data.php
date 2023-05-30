<?php
 //載入 外部的php連線檔案
   include('conn.php');

//設定每頁的資料筆數
$pageRow_records = 3;
//預設目前頁數
$num_pages = 1;
//若有換頁，則頁數更新
if(isset($_GET['page'])){
    $num_pages = $_GET['page'];
}
//本頁開始紀錄筆數 = (頁數-1)*每頁筆數
$startRow_records = ($num_pages - 1) * $pageRow_records;
//未加筆數的sql
$sql_query = 'select * from students';
//有加限制筆數的SQL
$sql_query_limit = $sql_query." LIMIT {$startRow_records},{$pageRow_records}";  //" LIMIT要空一格
//取得有加限制筆數的資料結果 
$result = $db_link->query($sql_query_limit);
//取得全部筆數的資料結果 
$all_result = $db_link->query($sql_query);
//取得總筆數
$tot_records = $all_result->num_rows;
//計算總頁數=(總筆數/每頁筆數) => 再無條件進位 =>  ceil()
$total_pages = ceil($tot_records / $pageRow_records);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .container{
         text-align:center;
    }
</style>
</head>
<body>

<div class="container">
    <!-- echo => 顯示資料 -->
    <!-- <h1>總筆數:<?php echo $tot_records; ?></h1>      -->
    <h1>學生資料管理系統</h1>
    <p>目前的資料筆數:<?php echo $tot_records; ?> <a href="add.php"> 新增學生資料</a> </p>
     
    <table border= '1' align = 'center'>
        <!-- 欄位 -->
        <tr>
            <th>座號</th>
            <th>姓名</th>
            <th>性別</th>
            <th>生日</th>
            <th>信箱</th>
            <th>電話</th>
            <th>地址</th>
            <th>功能</th>
        </tr>
        <!-- 欄位 -->
        <?php

        //逐筆資料顯示
        while($row_rec = $result->fetch_assoc()){ 
         echo '<tr>';
           echo '<td>'.$row_rec["cID"].'</td>';
           echo '<td>'.$row_rec["cName"].'</td>';
           echo '<td>'.$row_rec["cSex"].'</td>';
           echo '<td>'.$row_rec["cBirthday"].'</td>';
           echo '<td>'.$row_rec["cEmail"].'</td>';
           echo '<td>'.$row_rec["cPhone"].'</td>';
           echo '<td>'.$row_rec["cAddr"].'</td>';
           echo '<td>';
           echo "<a href = 'edit.php?sid=>".$row_rec["cID"]."'>修改</a>";
           echo "<a href = 'del.php?sid=>".$row_rec["cID"]."'>刪除</a>";
           echo '</td>';
         echo '</tr>';
   
        }
        //  //取得第一筆資料
        //  $row_rec = $result->fetch_assoc();
        //   echo '<tr>';
        //     echo '<td>'.$row_rec["cID"].'</td>';
        //     echo '<td>'.$row_rec["cName"].'</td>';
        //     echo '<td>'.$row_rec["cSex"].'</td>';
        //     echo '<td>'.$row_rec["cBirthday"].'</td>';
        //     echo '<td>'.$row_rec["cEmail"].'</td>';
        //     echo '<td>'.$row_rec["cPhone"].'</td>';
        //     echo '<td>'.$row_rec["cAddr"].'</td>';
        //     echo '<td>';
        //     echo '<a href = "#">修改</a>';
        //     echo '<a href = "#">刪除</a>';
        //     echo '</td>';
        //   echo '</tr>';
        ?>
    </table>
    <!-- 分頁導覽頁:文字 -->
    <table align="center" style="margin-top:20px" >
        <tr>
            <?php if($num_pages > 1){ ?>
            <td><a href="data.php?page=1">第一頁</a></td>
            <td><a href="data.php?page=<?php echo $num_pages-1 ?>">上一頁</a></td>
            <?php } ?>

            <?php if($num_pages < $total_pages){ ?>
            <td><a href="data.php?page=<?php echo $num_pages+1 ?>">下一頁</a></td>
            <td><a href="data.php?page=<?php echo $total_pages ?>">最後頁</a></td>
            <?php } ?>
        </tr>
    </table>
    <!-- 分頁導覽頁:數字 -->
    <table align="center" style="margin-top:20px" >
        <tr>
            <!-- <td>12345</td> -->
            <td>
                <?php
                //迴圈產生所有的頁數
                    for($i = 1; $i <= $total_pages;$i++){
                        if($i == $num_pages){ //只有一頁的時候
                            echo $i." ";
                        }else{    //不只有一頁的時候，並且有超連結
                            echo "<a href='data.php?page={$i}'>{$i} </a>";
                        }
                    }
                ?>
            </td>
        </tr>
    </table>
</div>
</body>
</html>