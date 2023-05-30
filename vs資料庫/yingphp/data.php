<?php
    // 載入外部的PHP連線檔案
    include('conn.php');
    // 預設每頁的資料筆數
    $pageRow_records = 3;
    // 預設頁數
    $number_pages = 1;
    // 若有換頁，則頁數更新
    if(isset($_GET['page'])){
        // 如果換頁，預設頁數($number_pages)從1變成當前頁數($_GET['page'])
        $number_pages = $_GET['page'];
    }
    // 本頁開始記錄筆數 = (當前頁數-1) * 每頁的紀錄
    $startRow_records = ($number_pages - 1) * $pageRow_records;
    
    // 未加筆數的SQL
    $sql_query = 'select * from students';
    // 有加上限制筆數的SQL
    $sql_query_limit = $sql_query." LIMIT {$startRow_records},{$pageRow_records}";
    // 取得有加限制筆數的查詢結果
    $result = $db_link->query($sql_query_limit);
    // 取得全部筆數的查詢結果
    $all_result = $db_link->query($sql_query);
    // 取得總筆數
    $tot_records = $all_result ->num_rows;
    // 計算總頁數(總筆數/每頁筆數) => 再無條件進位 ceil()
    $total_pages = ceil ($tot_records / $pageRow_records);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container{
        width: 800px;
        margin:0 auto;
        text-align:center;
    }
</style>
<body>
    <div class="container">
        <!-- echo=>顯示資料 -->
        <!-- <h1>總筆數：<?php echo $tot_records ?></h1> -->
        <h1>學生管理系統</h1>
        <p>目前總筆數：<?php echo $tot_records ?><a href="add.php">新增學生資料</a>
        </p>
        <table border="1" align="center">
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
            <!-- 資料 -->
            <?php
                // $row_rec = $result->fetch_assoc();取得一筆紀錄
                // 多筆資料要透過迴圈
                while($row_rec = $result->fetch_assoc()){
                    // 取得(逐筆)紀錄
                    echo '<tr>';
                    echo '<td>'.$row_rec["cID"].'</td>';
                    echo '<td>'.$row_rec["cName"].'</td>';
                    echo '<td>'.$row_rec["cSex"].'</td>';
                    echo '<td>'.$row_rec["cBirthday"].'</td>';
                    echo '<td>'.$row_rec["cEmail"].'</td>';
                    echo '<td>'.$row_rec["cPhone"].'</td>';
                    echo '<td>'.$row_rec["cAddr"].'</td>';
                    echo '<td>';
                    echo "<a href='edit.php?sid=".$row_rec["cID"]."'>修改</a>";
                    echo "<a href='del.php?sid=".$row_rec["cID"]."'>刪除</a>";
                    echo '</td>';
                    echo '</tr>';
                }
            ?>

        </table>
        <!-- 分頁導覽列：文字 -->
        <table align = "center" style="margin-top:20px;">
            <tr>
                <?php if($number_pages > 1){ ?>
                    <td><a href="data.php?page=1">第一頁</a></td>
                    <td><a href="data.php?page=<?php echo $number_pages-1 ?>">上一頁</a></td>
                <?php } ?>
                <?php if($number_pages < $total_pages){ ?>
                    <td><a href="data.php?page=<?php echo $number_pages+1 ?>">下一頁</a></td>
                    <td><a href="data.php?page=<?php echo $total_pages ?>">最末頁</a></td>
                <?php } ?>
            </tr>
        </table>
        <!-- 分頁導覽列：數字 -->
        <table align = "center" style="margin-top:20px;">
            <tr>
                <!-- <td>12345</td> -->
                <td>
                    <?php
                    // 迴圈產生所有頁數
                        for($i=1;$i<=$total_pages;$i++){
                            // 只有一頁時，而且在第一頁
                            if($i == $number_pages){
                                echo $i." ";
                            }else{
                                // 不只一頁
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