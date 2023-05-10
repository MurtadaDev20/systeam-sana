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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Requests/</span> Manage Requests</h4>
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="card">
                                        <h5 class="card-header text-center">
                                            Request From
                                            <?php
                                            $query_name = mysqli_query($con, "SELECT * FROM request  where coust_id = '$request'");
                                            $row_name = mysqli_fetch_assoc($query_name);
                                            $name = $row_name['customer_name'];
                                            echo $name;
                                            ?>
                                        </h5>
                                        <hr>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table" id="example">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category </th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Source</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Other Request</th>
                                                        <th>coordinates</th>
                                                        <th>Order Number</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0 text-center">
                                                    <tr>
                                                        <?php
                                                        $requests = mysqli_query(
                                                            $con,
                                                            "SELECT r.id , r.coust_id ,  r.customer_name , r.quantity , r.date , r.source , r.req_from , r.req_to , r.other , r.coordinates , r.date , r.order_number, c.Name_Category , p.product_name FROM request r  
                                                                INNER JOIN categories c ON r.category_id = c.id
                                                                INNER JOIN products p ON r.product_id = p.p_id
                                                                where coust_id = '$request'
                                                                ORDER BY id DESC"
                                                        );

                                                        $num = 1;
                                                        while ($row = mysqli_fetch_assoc($requests)) {



                                                        ?>
                                                    <tr>

                                                        <td><?php echo $num; ?></td>
                                                        <td><?php echo $row['Name_Category'] ?></td>
                                                        <td><?php echo $row['product_name'] ?></td>
                                                        <td><?php echo $row['quantity'] ?></td>
                                                        <td><?php echo $row['source'] ?></td>
                                                        <td><?php echo $row['req_from'] ?></td>
                                                        <td><?php echo $row['req_to'] ?></td>
                                                        <td><?php echo $row['other'] ?></td>
                                                        <td><?php echo $row['coordinates'] ?></td>
                                                        <td><?php echo $row['order_number'] ?></td>
                                                        <td><?php echo $row['date'] ?></td>

                                                        <td>





                                                        <?php
                                                        }




                                                        ?>
                                                        </td>


                                                        <?php
                                                        $num++;

                                                        ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="card text-center">
                                        <h5>
                                            <div class="card-header">Action</div>
                                        </h5>
                                        <div>
                                            <div class="text-center p-3">
                                                <a href="request_internal.php?request=<?php echo $request ?>"><button name="com_req" class="btn btn-outline-success ">Accept</button></a>
                                                <a href="rejection_request.php?rejection=<?php echo $id_invoice ?>" class="btn btn-outline-danger">Rejection</a>
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