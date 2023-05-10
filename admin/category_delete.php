<?php
include './function/config.php';

if (isset($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $query = "DELETE from categories where id ='$del_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header('location:categories_manage.php');
    }
}
