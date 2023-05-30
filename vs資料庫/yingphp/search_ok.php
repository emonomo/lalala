<?php
    $searchNo = $_POST["sid"];
    // 載入外部的連線檔案
    include('conn.php');
    $sql_query = 'select * from scorelist where cID=' .$searchNo;
    $result = $db_link->query($sql_query);
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
    <h1>成績查詢結果 - <small>查詢座號：<?php echo $searchNo ?></small></h1>
    <hr>
    <!-- 顯示查詢結果的資料 -->
    <table>
    <?php
        // 資料
        $tot = 0;
        // 多筆資料
        while($row_rec=$result->fetch_assoc()){
            // 累計分數
            $tot = $tot + $row_rec["score"];
            // 逐筆資料顯示
            echo '<tr>';
                // echo '<td>'.$row_rec["cID"].'</td>';
                echo '<td>'.$row_rec["course"].'</td>';
                echo '<td>'.$row_rec["score"].'</td>';
            echo '</tr>';

        }
        echo '<tr colspan=2>';
            echo '<td colspan=2><hr></td>';
        echo '</tr>';
        // 顯示總分與平均
        echo '<tr>';
            echo '<td>總分</td>';
            echo '<td>'.$tot.'</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>平均</td>';
            echo '<td>'.$tot/$result->num_rows.'</td>';
        echo '</tr>';
    ?>
       
    </table>
</body>
</html>