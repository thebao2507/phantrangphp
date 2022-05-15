<meta charset="utf8">
<?php
//require 'site.php';
//load_top();
//load_header();
//load_menu();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phân trang php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        .tab {
            height: 500px;
        }

        td{
            padding:10px;
        }
    </style>
</head>
<body>
    <?php
        // 1. kết nối với database
        $conn = new mysqli("localhost","root","","htweb") or die("không kết nối được");

        // 2. tìm limit và trang hiện tại
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;

        // 3.tính tổng số dữ liệu
        //$sql = "select count(id) as total from tbsinhvien";
        $result = $conn->query("select count(id) as total from tbsinhvien");
        $row = $result->fetch_assoc();
        $total_records = $row['total'];

        // 4.tính tổng số trang
        $total_page = ceil($total_records / $limit);
 
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                 $current_page = 1;
            }
        // 5.tìm điểm bắt đầu
        $start = ($current_page - 1) * $limit;

        // 6.truy vấn lây dữ liệu
            // Có limit và start rồi thì truy vấn CSDL lấy dữ liệu
            $sqlcmd = "select * from tbsinhvien limit $start, $limit";
            $result = $conn->query($sqlcmd);
    ?>
    <div class="table-bordered table-striped tab">
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
    <!--pagination-->
    <div>
        <?php
        echo "<div>";
            include 'pagination.php';
        echo "</div>";
        ?>
    </div>
</body>
</html>
<?php
//load_footer();
?>