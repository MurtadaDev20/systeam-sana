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


                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Add product</h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5 class="card-header">Products</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">

                                            <tr>
                                                <?php
                                                $products = mysqli_query($con, "SELECT * FROM `products`  INNER JOIN categories  WHERE products.cat_id = categories.id ORDER BY products.p_id DESC");
                                                $num = 1;
                                                while ($row = mysqli_fetch_assoc($products)) {
                                                    echo '
                                                            <tr>
                                                                <td>' . $num . '</td>
                                                                <td>' . $row['product_name'] . '</td>
                                                                <td>' . $row['Name_Category'] . '</td>
                                                                <td>
                                                                <a href="product_edite.php?products=' . $row['p_id'] . '" class="btn btn-info btn-xs">Edit</a>
                                                                <a href="product_delete.php?delete=' . $row['p_id'] . '" class="btn btn-danger btn-xs">Delete</a>
                                                                </td>
                                                                
                                                            </tr>
                                                        ';
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
                        <?php include './inc/footer.php' ?>
</body>

</html>