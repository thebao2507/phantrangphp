<meta charset="utf8">
<?php
require 'site.php';
load_top();
load_header();
load_menu();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>phân trang trong PHP và MySQL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php 
            // PHẦN XỬ LÝ PHP
            // BƯỚC 1: KẾT NỐI CSDL
            $conn = new mysqli("localhost", "root", "", "htweb");
 
            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            $sql = "select count(id) as total from tbsinhvien";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total_records = $row['total'];
 
            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 10;
 
            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
            // tổng số trang
            $total_page = ceil($total_records / $limit);
 
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                 $current_page = 1;
            }
 
            // Tìm Start
            $start = ($current_page - 1) * $limit;
 
            // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $sqlcmd = "select * from tbsinhvien limit $start, $limit";
            $result = $conn->query($sqlcmd);
            ?>
            <div>
                <?php 
                echo "<table align='center' border='1'>";
                echo "<tr>
                    <td align='center'>id</td>
                    <td align='center'>username</td>
                    <td align='center'>password</td>
                    <td align='center'>fullname</td>
                    <td align='center'>mathi</td>
                    <td align='center'>made1</td>
                    <td align='center'>made2</td>
                    <td align='center'>made3</td>
                    <td align='center'>thoigianbatdau</td>
                    <td align='center'>maxacnhan</td>
                    <td align='center'>diem</td>
                </tr>";
                while($row = $result->fetch_array())
                {
                echo "<tr>
                        <td align='center'>".$row['id']."</td>
                        <td align='center'>".$row['username']."</td>
                        <td align='center'>".$row['password']."</td>
                        <td align='center'>".$row['fullname']."</td>
                        <td align='center'>".$row['mathi']."</td>
                        <td align='center'>".$row['made1']."</td>
                        <td align='center'>".$row['made2']."</td>
                        <td align='center'>".$row['made3']."</td>
                        <td align='center'>".$row['tgbatdau']."</td>
                        <td align='center'>".$row['maxacnhan']."</td>
                        <td align='center'>".$row['diem']."</td>
                    </tr>";
            //	$stt++;
                }
                 echo "</table>";
                ?>
            </div>
            <div class="pagination">
            <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a class="page_item" href="index1.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page){
                echo '<span>'.$i.'</span> | ';
            }
            else{
                echo '<a href="index1.php?page='.$i.'">'.$i.'</a> | ';
            }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index1.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
    </body>
</html>
<?php
load_footer();
?>

