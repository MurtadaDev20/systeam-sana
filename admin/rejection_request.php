<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<?php
if (isset($_GET['rejection']) && !empty($_GET['rejection'])) {
    $count = 0;
    global $con;
    $rejection = $_GET['rejection'];
    $query = mysqli_query($con, "SELECT * FROM invoice where id = '$rejection'");

    $row_rej = mysqli_fetch_assoc($query);

    $invoice_name = $row_rej['invoice_name'];
    $rej_id = $row_rej['sub_id'];
}
?>

<?php

global $con;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rejection'])) {
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Rejection</span> </h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header  align-items-center text-center">
                                            <h5 class="mb-0 ">Rejection To <?php echo $invoice_name ?></h5>
                                        </div>
                                        <hr>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form action="" method="POST">

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Message</label>
                                                    <textarea name="message" id="basic-default-message" class="form-control" placeholder="Give a Reason" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
                                                </div>



                                                <button type="submit" class="btn btn-primary" name="rejection">Send</button>
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


<?php
global $con;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rejection'])) {




    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    if (empty($message)) {
?>
        <script>
            $(function() {
                Swal.fire('Error', 'Please Enter  Message', 'error')
            })
        </script>
    <?php
    } else {
        $query = mysqli_query($con, "INSERT INTO rejection_request (`text` , `resp_id`) VALUES ('$message','$rej_id')");


        $query_history = mysqli_query($con, "INSERT INTO history (`coust_name` , `text_rejection` , `sub_id` , `status`) VALUES ('$invoice_name','$message','$rej_id' , '0')");


    ?>
        <script>
            $(function() {
                Swal.fire('Success', 'Rejection Added to the Cordinator', 'success')
            })
        </script>
<?php

        $query_delete_invoice = mysqli_query($con, "DELETE from invoice where id ='$rejection'");
        $query_delete_request = mysqli_query($con, "DELETE from request where coust_id ='$rej_id'");

        header("REFRESH:1;URL=request_manage.php");
    }
}

?>