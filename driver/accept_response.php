<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
<?php
if (isset($_GET['accept']) && !empty($_GET['accept'])) {
    $count = 0;
    global $con;
    $accept = $_GET['accept'];
    $query = mysqli_query($con, "SELECT * FROM response where coust_id = '$accept'");


    $row_accept = mysqli_fetch_assoc($query);

    $received_date = $row_accept['date'];
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

            <?php
            include './inc/aside.php' 
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



                        <div class="container-xxl flex-grow-1 container-p-y" dir="rtl">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">التسليم</span> </h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card mb-4">
                                        <div class="card-header  align-items-center text-center">
                                            <h5 class="mb-0 ">تسليم الطلب</h5>
                                        </div>
                                        <hr>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label fs-5" for="basic-default-fullname">من</label>
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
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label fs-5" for="basic-default-fullname">الى</label>
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
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label fs-5" for="basic-default-fullname">الرجوع الى</label>
                                                            <select class="form-select" id="to" name="from_to">
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
                                                    <label class="form-label fs-5" for="basic-default-fullname">عداد الكيلو متر</label>
                                                    <input class="form-control" name="Kilometer" type="number" placeholder="180" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fs-5" for="basic-default-fullname">عداد الكاز قبل</label>
                                                    <input class="form-control" name="kerosene_before" type="number" placeholder="70" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fs-5" for="basic-default-fullname">عداد الكاز بعد</label>
                                                    <input class="form-control" name="kerosene_after" type="number" placeholder="70" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fs-5" for="basic-default-fullname">سعر الكاز</label>
                                                    <input class="form-control" name="kerosene_price" type="number" placeholder="70" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fs-5" for="basic-default-fullname">مصاريف المبيت</label>
                                                    <input class="form-control" name="overnight_expenses" type="number" placeholder="100" required>
                                                </div>



                                                <div class="mb-3">
                                                    <label class="form-label fs-5" for="basic-default-fullname">مصاريف اخرى</label>
                                                    <input class="form-control" name="other_expenses" type="number" placeholder="300" required>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label fs-5" for="basic-default-fullname">اضافة تقرير</label>
                                                    <input class="form-control" name="file" type="file" placeholder="300" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fs-5" for="basic-default-fullname">تاريخ البدء</label>
                                                    <input class="form-control" name="start_date" type="datetime-local" placeholder="300" required>
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




    $from = htmlspecialchars($_POST['from'], ENT_QUOTES, 'UTF-8');
    $to = htmlspecialchars($_POST['to'], ENT_QUOTES, 'UTF-8');
    $from_to = htmlspecialchars($_POST['from_to'], ENT_QUOTES, 'UTF-8');

    $Kilometer = htmlspecialchars($_POST['Kilometer'], ENT_QUOTES, 'UTF-8');

    $kerosene_before = htmlspecialchars($_POST['kerosene_before'], ENT_QUOTES, 'UTF-8');
    $kerosene_after = htmlspecialchars($_POST['kerosene_after'], ENT_QUOTES, 'UTF-8');

    $kerosene_price = htmlspecialchars($_POST['kerosene_price'], ENT_QUOTES, 'UTF-8');
    $overnight_expenses = htmlspecialchars($_POST['overnight_expenses'], ENT_QUOTES, 'UTF-8');
    $other_expenses = htmlspecialchars($_POST['other_expenses'], ENT_QUOTES, 'UTF-8');

    $total_expenses = $kerosene_price + $overnight_expenses + $other_expenses;


    $start_date = htmlspecialchars($_POST['start_date'], ENT_QUOTES, 'UTF-8');
    // $date_request = htmlspecialchars($_POST['start_date'], ENT_QUOTES, 'UTF-8');

    if (empty($from_to)) {
?>
        <script>
            $(function() {
                Swal.fire('Error', 'رجاء ادخل الموقع', 'error')
            })
        </script>
        <?php
    } else {
        
        // query Supervisor
        $query_supervisor = mysqli_query($con, "SELECT * FROM supervisor where id = '$accept'");
        $row_supervisor = mysqli_fetch_assoc($query_supervisor);
        $supervisor_name = $row_supervisor['fullName'];

        // query response
        $query_response = mysqli_query($con, "SELECT * FROM response where coust_id = '$accept'");
        $row_response = mysqli_fetch_assoc($query_response);
        $date_request = $row_response['date_request'];

        $allowed_extensions = array('pdf', 'jpg', 'png','PNG','JPG');
        $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $max_file_size = 10 * 1024 * 1024; // 10MB

        if (in_array($file_extension, $allowed_extensions)) {
            if ($_FILES['file']['size'] <= $max_file_size) {

                $file_name = uniqid() . '_' . $_FILES['file']['name'];
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_path = '../admin/uploads/' . $file_name;
                move_uploaded_file($file_tmp, $file_path);




                // Insert file name into MySQL database
                $query_history = mysqli_query($con, "INSERT INTO 
        completed_order (`driver_name` , `subr_name` , `from` , `to` , `from_to` , `Kilometer` , `kerosene_before` , `kerosene_after` , `kerosene_price` , `overnight_expenses`  , `other_expenses`, `total_expenses` ,`file`, `received_date` , `start_date` ,`date_request`) 
        VALUES 
        ('$_SESSION[fullName_driver]','$supervisor_name' ,'$from' , '$to' , '$from_to', '$Kilometer' , '$kerosene_before' , '$kerosene_after' , '$kerosene_price' , '$overnight_expenses'  , '$other_expenses' , '$total_expenses' , '$file_name' ,'$received_date' , '$start_date' , '$date_request')");


        ?>
                <script>
                    $(function() {
                        Swal.fire('Success', 'تم تسليم الطلب بنجاح', 'success')
                    })
                </script>
                <?php

                $query_delete_invoice = mysqli_query($con, "DELETE from response where driver_id ='$_SESSION[id_driver]'");

                header("REFRESH:1;URL=request_accept.php");


                ?>
                <script>
                    $(function() {
                        Swal.fire('Success', 'تم تسليم الطلب بنجاح', 'success')
                    })
                </script>
            <?php

                $query_delete_invoice = mysqli_query($con, "DELETE from request where coust_id ='$accept'");
                $query_delete_invoice = mysqli_query($con, "DELETE from invoice where sub_id ='$accept'");

                header("REFRESH:1;URL=request_accept.php");
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
}

?>