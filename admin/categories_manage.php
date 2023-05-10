<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>


<script>
    $(document).ready(function() {
        $(".datatables-basic").DataTable({
            lengthMenu: [10, 25, 50, 100], // Available options for number of rows

            dom: 'Blfrtip',
            buttons: ['csv', 'excel', 'pdf'],
            lengthMenu: [10, 25, 50, 100],
            language: {
                lengthMenu: 'Display _MENU_ rows',
            }
        });
    });
</script>

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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories/</span> Add Category</h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5 class="card-header">Supervisors</h5>
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="datatables-basic table border-top custom-table" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">

                                            <?php
                                            $supervisor = mysqli_query($con, "SELECT * FROM `categories` ORDER BY `id` DESC");
                                            $num = 1;
                                            while ($row = mysqli_fetch_assoc($supervisor)) {

                                                $query_products = ("SELECT * FROM products where cat_id = '$row[id]'");
                                                $res_products = mysqli_query($con, $query_products);
                                                $count = mysqli_num_rows($res_products);

                                            ?>

                                                <tr>

                                                    <td><?php echo $num; ?></td>
                                                    <td><?php echo $row['Name_Category'] ?></td>

                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="category_edite.php?category=<?php echo $row['id'] ?>">Edit</a>
                                                        <?php
                                                        if ($count > 0) {
                                                            echo " ";
                                                        } else {
                                                        ?>

                                                            <a class="btn btn-danger btn-xs" href="category_delete.php?delete=<?php echo $row['id'] ?>">Delete</a>

                                                        <?php
                                                        }




                                                        ?>
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