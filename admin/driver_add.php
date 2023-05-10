<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<?php
$fullname = "";
$hrms_id = "";
$department = "";
?>

<?php

global $con;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_driv'])) {




    $fullname = htmlspecialchars($_POST['fullname'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');

    $count = 0;
    $res = mysqli_query($con, "SELECT * FROM driver where fullname = '$fullname'");
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
                Swal.fire('Error', 'Please Enter The Phone', 'error')
            })
        </script>
    <?php
    } elseif ($count == 1) {
    ?>
        <script>
            $(function() {
                Swal.fire('Error', 'The Name Aleardy Exists', 'error')
            })
        </script>
        <?php
    } else {
        $count_pass = 0;
        $query_pass = mysqli_query($con, "SELECT * FROM driver where `password` = '$password'");
        $count_pass = mysqli_num_rows($query_pass);

        if ($count_pass == 1) {
        ?>

            ?><script>
                $(function() {
                    Swal.fire('Error', 'The Password Aleardy Exists', 'error')
                })
            </script>

        <?php
        } else {
            $date = date('Y-m-d H:i:s');
            $query = mysqli_query($con, "INSERT INTO driver (`fullName` , `password` , `phone`   ) 

        VALUES 

        ('$fullname','$password' , '$phone')");

        ?><script>
                $(function() {
                    Swal.fire('Success', ' Driver Added ', 'success')
                })
            </script>

<?php
            header("REFRESH:1;URL=driver_add.php");
        }
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Drivers/</span> Add Driver</h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Add</h5>
                                            <small class="text-muted float-end">Driver</small>
                                        </div>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form  method="POST">

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname" id="basic-default-fullname" value="<?php echo $fullname ?>" placeholder="Ali Mohammed" />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Password</label>
                                                    <input type="password" name="password" class="form-control" id="basic-default-fullname" placeholder="............." />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Phone</label>
                                                    <input type="number" name="phone" class="form-control" name="fullname" id="basic-default-fullname" value="<?php echo $hrms_id ?>" placeholder="07723468765" />
                                                </div>

                                                


                                                <button type="submit" class="btn btn-primary" name="add_driv">Add</button>
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