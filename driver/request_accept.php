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
                            <h4 class="fw-bold py-3 mb-4 "><span class="text-muted fw-light">الطلبات/</span> كافة الطلبات </h4>
                            <div class="row ">
                                <div class="col-md-9">
                                    <!-- Basic Bootstrap Table -->
                                    <div class="card" dir="rtl">
                                        <h5 class="card-header text-center">اسم المستلم : <?php
                                            $query_res_name = mysqli_query($con, "SELECT * FROM response where driver_id = '$_SESSION[id_driver]'");
                                            $row_name = mysqli_fetch_assoc($query_res_name);
                                            if (!empty($row_name)) {
                                                echo $row_name['customer_name'];
                                            } else {
                                                echo "لايوجد";
                                            }

                                            ?></h5>
                                        <hr>
                                        <div class="table-responsive text-nowrap ">
                                            <table class="table" id="example">
                                                <thead>

                                                    <tr>
                                                        <th>#</th>
                                                        <th class="fs-5">القسم</th>
                                                        <th class="fs-5">الطلب</th>
                                                        <th class="fs-5">طلبات اخرى</th>
                                                        <th class="fs-5">الكمية</th>
                                                        <th class="fs-5">جهة التصدير</th>
                                                        <th class="fs-5">من</th>
                                                        <th class="fs-5">الى</th>
                                                        <th class="fs-5">الاحداثي</th>
                                                        <th class="fs-5">رقم الاوردر</th>
                                                    </tr>

                                                </thead>
                                                <tbody class="table-border-bottom-0">

                                                    <tr>
                                                        <?php
                                                        $requests = mysqli_query(
                                                            $con,
                                                            "SELECT r.driver_id , r.id , r.coust_id , r.customer_name , r.quantity , r.source , r.req_from , r.req_to , r.other , r.coordinates , r.order_number , r.date , c.Name_Category , p.product_name FROM response r  
                                                            INNER JOIN categories c ON r.category_id = c.id
                                                            INNER JOIN products p ON r.product_id = p.p_id
                                                            Where r.driver_id = '$_SESSION[id_driver]' 
                                                            ORDER BY id DESC"
                                                        );

                                                        $num = 1;
                                                        while ($row = mysqli_fetch_assoc($requests)) {



                                                        ?>
                                                    <tr>

                                                        <td><?php echo $num; ?></td>
                                                        <td><?php echo $row['Name_Category'] ?></td>
                                                        <td><?php echo $row['product_name'] ?></td>
                                                        <td><?php echo $row['other'] ?></td>
                                                        <td><?php echo $row['quantity'] ?></td>
                                                        <td><?php echo $row['source'] ?></td>
                                                        <td><?php echo $row['req_from'] ?></td>
                                                        <td><?php echo $row['req_to'] ?></td>
                                                        <td><?php echo $row['coordinates'] ?></td>
                                                        <td><?php echo $row['order_number'] ?></td>

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
                                    <?php
                                    $count = 0;
                                    $query_check_responce = mysqli_query($con, "SELECT * FROM response Where driver_id = '$_SESSION[id_driver]'");
                                    $count = mysqli_num_rows($query_check_responce);

                                    if ($count > 0) {
                                    ?>

                                        <div class="card text-center">
                                            <h5>
                                                <div class="card-header">العمليات</div>
                                            </h5>
                                            <div>
                                                <?php
                                                $query_select_id = mysqli_query($con, "SELECT * FROM response Where driver_id = '$_SESSION[id_driver]' ");
                                                $row_select_id = mysqli_fetch_assoc($query_select_id);
                                                ?>
                                                <div class="text-center p-3">
                                                    <a class="btn btn-info" href="accept_response.php?accept=<?php echo $row_select_id['coust_id']; ?>">موافقة</a>
                                                    <a class="btn btn-danger" href="rejection_driver.php?rejection=<?php echo $row_select_id['coust_id']; ?>">رفض</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

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

    $query_check = (mysqli_query($con, "SELECT * FROM cart where coust_id = '$_SESSION[id_driver]' "));
    $query = (mysqli_query($con, "SELECT * FROM cart where coust_id = '$_SESSION[id_driver]' "));

    $row = mysqli_fetch_array($query_check);
    if (empty($row['id'])) {
?>
        <script>
            $(function() {
                Swal.fire('قم باضافة طلب على الاقل', '  ', 'error')
            })
        </script>
    <?php
        header("REFRESH:1;URL=request_add.php");
    } else {


        while ($row_cart = mysqli_fetch_array($query)) {



            $customer_name = $row_cart['customer_name'];
            $coust_id = $row_cart['coust_id'];
            $category_id = $row_cart["category_id"];
            $product_id = $row_cart["product_id"];
            $from = $row_cart["req_from"];
            $to = $row_cart["req_to"];
            $quantity = $row_cart["quantity"];
            $source = $row_cart["source"];
            $coordinates = $row_cart["coordinates"];


            if ($coust_id == 1) {
            }


            $insert_req = mysqli_query($con, "INSERT INTO request ( `customer_name`, `coust_id`, `category_id`, `product_id`,`quantity`, `source`, `req_from` , `req_to` , `coordinates`) 
                VALUES('$customer_name','$coust_id','$category_id','$product_id','$quantity','$source','$from' , '$to' , '$coordinates')");


            $query_del = mysqli_query($con, "DELETE from cart where coust_id = '$_SESSION[coust_id]'");
        }





        $insert_invoice = mysqli_query($con, "INSERT INTO invoice (`invoice_name`,`sub_id`) VALUES ( '$_SESSION[fullName]' , '$_SESSION[coust_id]')")



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
    }
}









?>