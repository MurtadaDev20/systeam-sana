<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
</head>

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


                        <div class="container-xxl flex-grow-1 container-p-y" dir="rtl">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">الطلبات/</span> كافة الطلبات </h4>
                            <div class="row ">
                                <div class="col-md-9">
                                    <!-- Basic Bootstrap Table -->
                                    <div class="card" dir="rtl">
                                        <h5 class="card-header">الطلبات</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table" id="example">
                                                <thead>

                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Source</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Other</th>
                                                        <th>coordinates</th>
                                                        <th>Oredr Number</th>
                                                        <th>Action</th>
                                                    </tr>

                                                </thead>
                                                <tbody class="table-border-bottom-0">

                                                    <tr>
                                                        <?php
                                                        $requests = mysqli_query(
                                                            $con,
                                                            "SELECT r.coust_id ,r.order_number ,r.other, r.id , r.coust_id , r.customer_name , r.quantity , r.source , r.req_from , r.req_to , r.coordinates , r.date , c.Name_Category , p.product_name FROM cart r  
                                                            INNER JOIN categories c ON r.category_id = c.id
                                                            INNER JOIN products p ON r.product_id = p.p_id
                                                            Where r.coust_id = '$_SESSION[coust_id]' 
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

                                                        <td>
                                                            <a class="btn btn-danger btn-xs" href="cart_delete.php?delete=<?php echo $row['id'] ?>">Delete</a>




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
                                            <div class="card-header">اتمام الطلب</div>
                                        </h5>
                                        <div>
                                            <form method="POST">
                                                <div class="text-center p-3">
                                                    <button name="com_req" class="btn btn-info ">اتمام الطلب</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- / Content -->


                        <!-- Footer -->
                        <?php
                        include './inc/footer.php'
                        ?>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['com_req'])) {

    $query_check = (mysqli_query($con, "SELECT * FROM cart where coust_id = '$_SESSION[coust_id]' "));
    $row = mysqli_fetch_array($query_check);

    if (!empty($row['id'])) {
        $insert_invoice = mysqli_query($con, "INSERT INTO invoice (`invoice_name`,`sub_id`) VALUES ( '$_SESSION[fullName]' , '$_SESSION[coust_id]')");


        $query = (mysqli_query($con, "SELECT * FROM cart c
    INNER JOIN invoice i ON i.sub_id = c.coust_id
    where c.coust_id = '$_SESSION[coust_id]' "));



        while ($row_cart = mysqli_fetch_array($query)) {




            $customer_name = $row_cart['customer_name'];
            $coust_id = $row_cart['coust_id'];
            $category_id = $row_cart["category_id"];
            $product_id = $row_cart["product_id"];
            $from = $row_cart["req_from"];
            $quantity = $row_cart["quantity"];
            $to = $row_cart["req_to"];
            $other = $row_cart["other"];
            $source = $row_cart["source"];
            $coordinates = $row_cart["coordinates"];
            $order_number = $row_cart["order_number"];





            $insert_req = mysqli_query($con, "INSERT INTO request ( `customer_name`, `coust_id`, `category_id`, `product_id`,`quantity`, `source`, `req_from` , `req_to` , `other` , `coordinates`,`order_number`) 
                VALUES('$customer_name','$coust_id','$category_id','$product_id','$quantity','$source','$from' , '$to' , '$other' , '$coordinates' , '$order_number')");


            $query_del = mysqli_query($con, "DELETE from cart where coust_id = '$_SESSION[coust_id]'");
        }











?>
        <script>
            $(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'تم  اضافة الطلب',
                    showConfirmButton: false,
                    timer: 1000
                })
            })
        </script>
<?php





        header("REFRESH:1;URL=request_add.php");
    } else {
        ?>
        <script>
            $(function() {
                Swal.fire('قم باضافة طلب على الاقل', '  ', 'error')
            })
        </script>
    <?php
        header("REFRESH:1;URL=request_add.php");
    }
}









?>