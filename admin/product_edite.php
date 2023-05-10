<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<?php

global $con;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_product'])) {




    $product_name = htmlspecialchars($_POST['product_name'], ENT_QUOTES, 'UTF-8');
    $cat_id = $_POST['name_cat'];

    $count = 0;
    $res = mysqli_query($con, "SELECT * FROM Products ");
    $count = mysqli_num_rows($res);

    if (empty($product_name)) {
?>
        <script>
            $(function() {
                Swal.fire('Error', 'Please Enter Product', 'error')
            })
        </script>
    <?php
    } elseif ($cat_id == 0) {
    ?>
        <script>
            $(function() {
                Swal.fire('Error', 'Select Category Name', 'error')
            })
        </script>
        <?php
    } else {

        $slug = strtolower(str_replace(' ', '-', $product_name));
        $update = mysqli_query($con, "UPDATE `products` SET `product_name` = '$product_name' , `slug` = '$slug' , cat_id = '$cat_id' where `p_id` = '$_GET[products]' ");
        if (isset($update)) {

        ?><script>
                $(function() {
                    Swal.fire('Success', ' Supervisor Edited ', 'success')
                })
            </script>

<?php
            header("REFRESH:1;URL=product_manage.php");
        }
    }
}




if (isset($_GET['products']) && !empty($_GET['products'])) {
    $count = 0;
    global $con;
    $products = $_GET['products'];
    $query = "SELECT * FROM products where p_id = '$products'";
    $res = mysqli_query($con, $query);
    $product_row = mysqli_fetch_assoc($res);
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Edit Products</h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Edit</h5>
                                            <small class="text-muted float-end">Products</small>
                                        </div>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form action="" method="POST">
                                                <?php
                                                // $get_product = mysqli_query($con, "SELECT product_name FROM `products` WHERE `id` = '$_GET[products]'");
                                                // $product = mysqli_fetch_assoc($get_product);
                                                ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Product Name</label>
                                                    <input type="text" class="form-control" name="product_name" id="basic-default-fullname" value="<?php echo $product_row['product_name'] ?>" />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Category Name</label>
                                                    <select type="text" name="name_cat" class="form-select" id="basic-default-fullname">
                                                        <option value="0">-- Select Category --</option>
                                                        <?php
                                                        global $con;
                                                        $query_cat = mysqli_query($con, "SELECT * FROM categories");

                                                        while ($row = mysqli_fetch_assoc($query_cat)) {

                                                        ?>
                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['Name_Category'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <button type="submit" class="btn btn-primary" name="edit_product">Edit</button>
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