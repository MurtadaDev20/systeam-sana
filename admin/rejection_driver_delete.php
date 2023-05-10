<?php
include './function/config.php';

if (isset($_GET['rejection_driver_delete'])) {
    $del_id = $_GET['rejection_driver_delete'];
    $query = "DELETE from rejection_driver where id ='$del_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header('location:rejection_manage.php');
    }
}
