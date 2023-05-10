<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<?php
if (isset($_GET['request']) && !empty($_GET['request'])) {
    $count = 0;
    global $con;
    $request = $_GET['request'];
    $query = "SELECT * FROM request where coust_id = '$request'";

    $query_invoic = mysqli_query($con, "SELECT * FROM invoice where sub_id = '$request'");
    $row_invoice = mysqli_fetch_assoc($query_invoic);
    $id_invoice = $row_invoice['id'];
}
?>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include './inc/aside.php' ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include './inc/nav.php' ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">



                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Request/</span> Driver</h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Add</h5>
                                            <small class="text-muted float-end">Request</small>
                                        </div>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form action="" method="POST">


                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Driver Name</label>
                                                    <select type="text" name="name_drive" class="form-select" id="basic-default-fullname">
                                                        <option value="0">-- Select Driver --</option>
                                                        <?php
                                                        global $con;
                                                        $query_driv = mysqli_query($con, "SELECT * FROM driver");

                                                        while ($row = mysqli_fetch_assoc($query_driv)) {

                                                        ?>
                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <button type="submit" class="btn btn-primary" name="int_trans">Add Driver</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php include './inc/footer.php' ?>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['int_trans'])) {

    $query_select = mysqli_query($con, "SELECT * FROM request where coust_id = '$request'");

    while ($row_cart = mysqli_fetch_array($query_select)) {

        $id_drive = $_POST['name_drive'];

        $customer_name = $row_cart['customer_name'];
        $coust_id = $row_cart['coust_id'];
        $category_id = $row_cart["category_id"];
        $product_id = $row_cart["product_id"];
        $from = $row_cart["req_from"];
        $to = $row_cart["req_to"];
        $other = $row_cart["other"];
        $quantity = $row_cart["quantity"];
        $source = $row_cart["source"];
        $coordinates = $row_cart["coordinates"];
        $order_number = $row_cart["order_number"];
        $date = $row_cart["date"];

        if ($id_drive == 0) {
?><script>
                $(function() {
                    Swal.fire('Error', 'Select Driver Please', 'error')
                })
            </script>

        <?php
        } else {
            $insert_resp = mysqli_query($con, "INSERT INTO response ( `customer_name`, `coust_id` ,`driver_id`, `category_id`, `product_id`,`quantity`, `source`, `req_from` , `req_to` , `other` , `coordinates` , `order_number` , `date_request`) 
                VALUES('$customer_name','$coust_id','$id_drive','$category_id','$product_id','$quantity','$source','$from' , '$to' , '$other' , '$coordinates' , '$order_number' , '$date')");

        ?><script>
                $(function() {
                    Swal.fire('Success', 'The driver has been added', 'success')
                })
            </script>

<?php
            $query_del = mysqli_query($con, "DELETE from request where coust_id = '$request'");
            $query_del = mysqli_query($con, "DELETE from invoice where sub_id = '$request'");
            header("REFRESH:1;URL=request_manage.php");
        }
    }
}

?>