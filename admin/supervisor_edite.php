<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<?php

?>

<?php

global $con;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_sub'])) {




    $fullname = htmlspecialchars($_POST['fullname'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $hrms_id = htmlspecialchars($_POST['hrms_id'], ENT_QUOTES, 'UTF-8');
    $department = htmlspecialchars($_POST['department'], ENT_QUOTES, 'UTF-8');

    $count = 0;
    $res = mysqli_query($con, "SELECT * FROM supervisor");
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
    } elseif (empty($hrms_id)) {
    ?>
        <script>
            $(function() {
                Swal.fire('Error', 'Please Enter The HRMS', 'error')
            })
        </script>
    <?php
    } elseif (empty($department)) {
    ?>
        <script>
            $(function() {
                Swal.fire('Error', 'Please Enter The Department', 'error')
            })
        </script>
        <?php
    } else {
        
        $date = date('Y-m-d H:i:s');
        $update = mysqli_query($con, "UPDATE `supervisor` SET `fullName` = '$fullname', `password` = '$password', `HRMS_id` = '$hrms_id' , `Department` = '$department' , updated_at = '$date' , updated_by = '$_SESSION[username]' WHERE `id` = '$_GET[supervisor]'");
        if (isset($update)) {

        ?><script>
                $(function() {
                    Swal.fire('Success', ' Supervisor Edited ', 'success')
                })
            </script>

        <?php
        header("REFRESH:1;URL=supervisor_manage.php");
        }
    }
}




$get_supervisor = mysqli_query($con, "SELECT * FROM `supervisor` WHERE `id` = '$_GET[supervisor]'");
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Supervisors/</span> Edit Supervisor</h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Add</h5>
                                            <small class="text-muted float-end">Supervisors</small>
                                        </div>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form action="" method="POST">

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname" id="basic-default-fullname" value="<?php echo $supervisor['fullName'] ?>" placeholder="Ali Mohammed" />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Password</label>
                                                    <input type="password" name="password" class="form-control" id="basic-default-fullname" value="<?php echo $supervisor['password'] ?>" placeholder="............." />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">HRMS_id</label>
                                                    <input type="number" name="hrms_id" class="form-control" name="fullname" id="basic-default-fullname" value="<?php echo $supervisor['HRMS_id'] ?>" placeholder="958574" />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Department</label>
                                                    <input type="text" class="form-control" name="department" id="basic-default-fullname" value="<?php echo $supervisor['Department'] ?>" placeholder="Ali Mohammed" />
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