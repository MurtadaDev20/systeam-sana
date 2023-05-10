<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
<?php
if (isset($_GET['accept']) && !empty($_GET['accept'])) {
    $count = 0;
    global $con;
    $accept = $_GET['accept'];
    $query = mysqli_query($con, "SELECT * FROM response where coust_id = '$accept'");


    // $row_accept = mysqli_fetch_assoc($query);

    // $received_date = $row_accept['date'];
    // $rej_id = $row_rej['sub_id'];
}
?>

<?php

global $con;

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rejection'])) {
// }
?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include './inc/aside.php'
            ?>

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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">External</span> </h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header  align-items-center text-center">
                                            <h5 class="mb-0 ">Request External</h5>
                                        </div>
                                        <hr>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form method="POST" enctype="multipart/form-data">

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Name Recipient</label>
                                                    <input class="form-control" name="name_recipient" type="text" placeholder="Ali" required>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="basic-default-fullname">From</label>
                                                            <select class="form-select" id="from" name="from">
                                                                <option>Select a from</option>
                                                                <option>بغداد</option>
                                                                <option>البصرة</option>
                                                                <option>النجف</option>
                                                                <option>واسط</option>
                                                                <option>ديالى</option>
                                                                <option>صلاح الدين</option>
                                                                <option>كركوك</option>
                                                                <option>المثنى</option>
                                                                <option>ميسان</option>
                                                                <option>بابل</option>
                                                                <option>الأنبار</option>
                                                                <option>كربلاء</option>
                                                                <option>نينوى</option>
                                                                <option>ذي قار</option>
                                                                <option>القادسية</option>
                                                                <option>السليمانية</option>
                                                                <option>أربيل</option>
                                                                <option>دهوك</option>
                                                                <option>كركوك </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="basic-default-fullname">To</label>
                                                            <select class="form-select" id="to" name="to">
                                                                <option>Select a to</option>
                                                                <option>بغداد</option>
                                                                <option>البصرة</option>
                                                                <option>النجف</option>
                                                                <option>واسط</option>
                                                                <option>ديالى</option>
                                                                <option>صلاح الدين</option>
                                                                <option>كركوك</option>
                                                                <option>المثنى</option>
                                                                <option>ميسان</option>
                                                                <option>بابل</option>
                                                                <option>الأنبار</option>
                                                                <option>كربلاء</option>
                                                                <option>نينوى</option>
                                                                <option>ذي قار</option>
                                                                <option>القادسية</option>
                                                                <option>السليمانية</option>
                                                                <option>أربيل</option>
                                                                <option>دهوك</option>
                                                                <option>كركوك </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Price</label>
                                                    <input class="form-control" name="price" type="number" placeholder="300" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Product Name</label>
                                                    <input class="form-control" name="product_name" type="text" placeholder="Mechanism" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Order Number</label>
                                                    <input class="form-control" name="order_number" type="number" placeholder="23" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Type Mechanism</label>
                                                    <input class="form-control" name="type_mechanism" type="text" placeholder="Crane" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">add file</label>
                                                    <input class="form-control" name="file" type="file" placeholder="300" required>
                                                </div>



                                                <button type="submit" class="btn btn-primary" name="accept">Send</button>
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accept'])) {




    $name_recipient = htmlspecialchars($_POST['name_recipient'], ENT_QUOTES, 'UTF-8');
    $from = htmlspecialchars($_POST['from'], ENT_QUOTES, 'UTF-8');
    $to = htmlspecialchars($_POST['to'], ENT_QUOTES, 'UTF-8');
    $price = htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');
    $product_name = htmlspecialchars($_POST['product_name'], ENT_QUOTES, 'UTF-8');
    $order_number = htmlspecialchars($_POST['order_number'], ENT_QUOTES, 'UTF-8');
    $type_mechanism = htmlspecialchars($_POST['type_mechanism'], ENT_QUOTES, 'UTF-8');

    $query_supervisor = mysqli_query($con, "SELECT * FROM supervisor where id = '$accept'");
    $row_supervisor = mysqli_fetch_assoc($query_supervisor);
    $supervisor_name = $row_supervisor['fullName'];

    $allowed_extensions = array('pdf', 'jpg', 'png');
    $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $max_file_size = 10 * 1024 * 1024; // 10MB

    // $file = $_FILES['file'];
    // $file_name = $file['name'];
    // $file_tmp_name = $file['tmp_name'];

    if (in_array($file_extension, $allowed_extensions)) {
        if ($_FILES['file']['size'] <= $max_file_size) {

            $file_name = uniqid() . '_' . $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_path = 'uploads/' . $file_name;
            move_uploaded_file($file_tmp, $file_path);


            

            // Insert file name into MySQL database
            $query_history = mysqli_query($con, "INSERT INTO 
        completed_order_external (`name_recipient` , `from_ex` , `to_ex` , `price` , `product_name` , `order_number` , `type_mechanism` , `file` ) 
        VALUES 
        ('$name_recipient','$from' , '$to' , '$price' , '$product_name' , '$order_number'  , '$type_mechanism' ,'$file_name')");


?>
            <script>
                $(function() {
                    Swal.fire('Success', 'تم تسليم الطلب بنجاح', 'success')
                })
            </script>
        <?php

            $query_delete_invoice = mysqli_query($con, "DELETE from request where coust_id ='$accept'");
            $query_delete_invoice = mysqli_query($con, "DELETE from invoice where sub_id ='$accept'");

            header("REFRESH:1;URL=request_manage.php");
        } else {
        ?>
            <script>
                $(function() {
                    Swal.fire('error', 'File size exceeds maximum limit of 10MB. ', 'error')
                })
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            $(function() {
                Swal.fire('error', 'Invalid file type. Allowed types are PDF, JPG, and PNG. ', 'error')
            })
        </script>
    <?php
    }
    // query Supervisor


    // query 
    // $query_supervisor = mysqli_query($con, "SELECT * FROM supervisor where id = '$accept'");
    // $row_supervisor = mysqli_fetch_assoc($query_supervisor);
    // $supervisor_name = $row_supervisor['fullName'];





}

?>