<?php  
//  $result_db = mysqli_query($conn,"SELECT COUNT(id) FROM posts"); 
//  $row_db = mysqli_fetch_row($result_db);  
//  $total_records = $row_db[0];  
//  $total_pages = ceil($total_records / $limit); 
    $pagLink = "<ul class='pagination'>";  
    for ($i=1; $i<=$total_page; $i++) {
                 $pagLink .= "<li class='page-item'><a class='page-link' href='index2.php?page=".$i."'>".$i."</a></li>";   
    }
    echo $pagLink . "</ul>";  
    ////////////////////////////////
//    if ($current_page > 1 && $total_page > 1){
//        //echo '<a class="page_item" href="index1.php?page='.($current_page-1).'">Prev</a> | ';
//        $pagLink .= "<li class='page-item'><a class='page-link' href='index2.php?page=".($current_page)."'>prev</a></li>";   
//    }
    // Lặp khoảng giữa
//    for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
//    if ($i == $current_page){
        //echo '<span>'.$i.'</span> | ';
//        $pagLink .= "<li class='page-item'><span class='page-link'>'.$i.'</span></li>";
//    }
//    else{
//        $pagLink .= "<li class='page-item'><a class='page-link' href='index2.php?page=".$i."'>".$i."</a></li>";
//    }
//    }
//    echo $pagLink . "</ul>";
    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút next
//    if ($current_page < $total_page && $total_page > 1){
        //echo '<a href="index1.php?page='.($current_page+1).'">Next</a> | ';
//        $pagLink .= "<li class='page-item'><a class='page-link' href='index2.php?page=".($current_page)."'>next</a></li>";
?>

