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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">الطلبات/</span> الطلبات المرفوضة </h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card " dir="rtl">
                                <h5 class="card-header">Supervisors</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>سبب الرفض</th>
                                                <th>التاريخ</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">

                                            <tr>
                                                <?php
                                                $query_select_rejection = mysqli_query($con, ("SELECT * FROM rejection_request where resp_id = '$_SESSION[coust_id]'"));

                                                $num = 1;
                                                while ($row = mysqli_fetch_assoc($query_select_rejection)) {
                                                ?>
                                            <tr>

                                                <td><?php echo $num; ?></td>
                                                <td><?php echo $row['text'] ?></td>
                                                <td><?php echo $row['date'] ?></td>

                                                <td>
                                                    <a class="btn btn-danger btn-xs" href="rejection_delete.php?delete=<?php echo $row['id'] ?>">حذف</a>

                                                </td>
                                            <?php
                                                    $num++;
                                                }
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
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