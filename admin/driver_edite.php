<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<?php

?>

<?php

global $con;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_sub'])) {




    $fullname = htmlspecialchars($_POST['fullname'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');

    $count = 0;
    $res = mysqli_query($con, "SELECT * FROM driver");
    $count = mysqli_num_rows($res);

    if (empty($fullname)) {
?>
        <script>
            $(function() {
                Swal.fire('Error', 'Please Enter Full Name', 'error')
            })
        </script>
    <?php
    } elseif (empty($password)) {
    ?>
        <script>
            $(function() {
                Swal.fire('Error', 'Please Enter The Password', 'error')
            })
        </script>
    <?php
    } elseif (empty($phone)) {
    ?>
        <script>
            $(function() {
                Swal.fire('Error', 'Please Enter The HRMS', 'error')
            })
        </script>
        <?php
    } else {

        $count_pass = 0;
        $query_pass = mysqli_query($con, "SELECT * FROM driver where `password` = '$password'");
        $count_pass = mysqli_num_rows($query_pass);

        if ($count_pass == 1) 
        {
            ?>

            <script>
                $(function() {
                    Swal.fire('Error', 'The Password Aleardy Exists', 'error')
                })
            </script>

            <?php

            // $date = date('Y-m-d H:i:s');
            $update = mysqli_query($con, "UPDATE `driver` SET `fullname` = '$fullname', `phone` = '$phone' WHERE `id` = '$_GET[driver]'");
            if ($update) 
                {

                ?>
                <!-- <script>
                        $(function() {
                            Swal.fire('Success', ' Driver Edited ', 'success')
                        })
                    </script> -->

                <?php
                    // header("REFRESH:1;URL=driver_manage.php");
                }
        } else 
            {
            $update = mysqli_query($con, "UPDATE `driver` SET `fullname` = '$fullname', `password` = '$password', `phone` = '$phone' WHERE `id` = '$_GET[driver]'");
            if (isset($update)) 
            {

            ?><script>
                    $(function() {
                        Swal.fire('Success', ' Driver Editeddddddddd ', 'success')
                    })
                </script>

            <?php
                header("REFRESH:1;URL=driver_manage.php");
            }
            
        }
            
    }
}




$get_supervisor = mysqli_query($con, "SELECT * FROM `driver` WHERE `id` = '$_GET[driver]'");
$supervisor = mysqli_fetch_assoc($get_supervisor);
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Drivers/</span> Edit Driver</h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Edit</h5>
                                            <small class="text-muted float-end">Driver</small>
                                        </div>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form action="" method="POST">

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname" id="basic-default-fullname" value="<?php echo $supervisor['fullname'] ?>" placeholder="Ali Mohammed" />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Password</label>
                                                    <input type="text" name="password" class="form-control" id="basic-default-fullname" value="<?php echo $supervisor['password'] ?>" placeholder="............." />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Phone</label>
                                                    <input type="number" name="phone" class="form-control" name="fullname" id="basic-default-fullname" value="<?php echo $supervisor['phone'] ?>" placeholder="958574" />
                                                </div>


                                                <button type="submit" class="btn btn-primary" name="edit_sub">Edit</button>
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