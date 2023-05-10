<?php
include './function/config.php';

if (isset($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $query = "DELETE from products where p_id ='$del_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header('location:product_manage.php');
    }
}

?>