<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<?php
$name_cat = "";
?>

<?php

global $con;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_cat'])) {




    $name_cat = htmlspecialchars($_POST['name_cat'], ENT_QUOTES, 'UTF-8');

    $count = 0;
    $res = mysqli_query($con, "SELECT * FROM categories where Name_Category = '$name_cat'");
    $count = mysqli_num_rows($res);

    if (empty($name_cat)) {
?>
        <script>
            $(function() {
                Swal.fire('Error', 'Please Enter Category Name', 'error')
            })
        </script>
    <?php
    } elseif ($count == 1) {
    ?>
        <script>
            $(function() {
                Swal.fire('Error', 'The Category Aleardy Exists', 'error')
            })
        </script>
    <?php
    } else {
        $slug = strtolower(str_replace(' ', '-', $name_cat));
        $query = mysqli_query($con, "INSERT INTO categories ( `Name_Category` , `Slug`  ) VALUES ('$name_cat' , '$slug')");

    ?>
        <script>
        $(function() {
            Swal.fire('Success', ' Category Added ', 'success')
        })
    </script>

    <?php
        header("REFRESH:1;URL=category_add.php");
    }
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories/</span> Add Category</h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Add</h5>
                                            <small class="text-muted float-end">Category</small>
                                        </div>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form action="" method="POST">

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname"> Category Name</label>
                                                    <input type="text" class="form-control" name="name_cat" id="basic-default-fullname" value="<?php echo $name_cat ?>" placeholder="Cars" />
                                                </div>



                                                <button type="submit" class="btn btn-primary" name="add_cat">Add</button>
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