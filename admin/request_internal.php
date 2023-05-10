<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
</head>
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Requests/</span> Transport </h4>
                            <div class="row">

                                <div class="col-sm-2"></div>
                                <div class="col-md-8 mt-3">
                                    <div class="card text-center">
                                        <h5>
                                            <div class="card-header fs-3">Transport</div>
                                            <hr>
                                        </h5>
                                        <div>
                                            
                                                <div class="text-center p-3">
                                                    <a href="request_internal_drive.php?request=<?php echo $request?>"><button  class="fs-3 btn btn-outline-primary mx-5">internal transfer</button></a>
                                                    <a href="request_external_drive.php?accept=<?php echo $request ?>" class="fs-3 btn btn-outline-secondary">external transfer</a>
                                                </div>
                                            


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic Bootstrap Table -->


                        </div>
                        <!-- / Content -->


                        <!-- Footer -->
                        <?php
                        include './inc/footer.php'
                        ?>
</body>

</html>

