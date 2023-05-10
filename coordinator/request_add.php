<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        // Send an AJAX request to the PHP script
        $.getJSON("api/GetData.php", function(data) {
            // Populate the category dropdown list
            var $categoryDropdown = $("#category-dropdown");
            $.each(data.categories, function(index, category) {
                $categoryDropdown.append("<option value='" + category.id + "'>" + category.Name_Category + "</option>");
            });

            // Populate the product dropdown list when the category dropdown changes
            $categoryDropdown.change(function() {
                var categoryId = $(this).val();
                var $productDropdown = $("#product-dropdown");
                $productDropdown.empty();
                $.each(data.products, function(index, products) {
                    if (products.cat_id == categoryId) {
                        $productDropdown.append("<option value='" + products.p_id + "'>" + products.product_name + " </option>");
                    }
                });
            });
        });


        // Send an AJAX request to the PHP script when the form is submitted
        $("#order-form").submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally


            var customerName =
                "<?php
                    // echo $_SESSION['fullName']; 
                    ?>"
            var categoryId = $("#category-dropdown").val();
            var from = $("#from").val();
            var to = $("#to").val();
            var other = $("#other").val();
            var quantity = $("#quantity").val();
            var source = $("#source").val();
            var productId = $("#product-dropdown").val();
            var coordinates = $("#coordinates").val();
            var order_number = $("#order_number").val();

            if (categoryId == "Select a category" || productId == "Select a product" || source == "Select a Source") {
                $("#message").text("nPlease select a category or product or  Source.");
                $("#message").removeClass().addClass("alert alert-danger").text("تاكد من اختيار كافة المدخلات");
                return;
            } else {
                $.post("request.php", {
                    // customer_name: customerName,
                    from: from,
                    to: to,
                    other: other,
                    quantity: quantity,
                    source: source,
                    category_id: categoryId,
                    product_id: productId,
                    coordinates: coordinates,
                    order_number: order_number
                }, function(data) {
                    $("#message").text(data); // Update the message element with the response from the server
                    $("#order-form")[0].reset(); // Reset the form
                    // $("#message").text("تمت اضافة الطلب")
                    $("#message").removeClass().addClass("alert alert-primary alert-dismissible").text("تمت اضافة الطلب");

                });
            }


        });
    });
</script>



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



                        <div class="container-xxl flex-grow-1 container-p-y" dir="rtl">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">الطلبات/</span> اضافة طلب </h4>

                            <!-- Basic Layout -->
                            <div class="row ">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-8">
                                    <div class=" w-90" id="message" role="alert"></div>
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">اضافة</h5>
                                            <small class="text-muted float-end">الطلبات</small>
                                        </div>
                                        <div class="card-body">

                                            <!-- Form -->

                                            <form id="order-form">

                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="basic-default-fullname">من</label>
                                                                <select class="form-select" id="from" name="category_id">
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
                                                                <label for="basic-default-fullname">الى</label>
                                                                <select class="form-select" id="to" name="category_id">
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
                                                    <label class="form-label" for="basic-default-fullname">التصنيف</label>

                                                    <select class="form-select" id="category-dropdown" name="category_id">
                                                        <option>Select a category</option>
                                                    </select>

                                                    <label class="form-label mt-4" for="basic-default-fullname">الطلب</label>
                                                    <select class="form-select" id="product-dropdown" name="product_id">
                                                        <option>Select a product</option>
                                                    </select>

                                                    <div class="mb-3">
                                                        <label class="form-label mt-4" for="basic-default-fullname">طلبات اخرى</label>
                                                        <input type="text" class="form-control" name="other" id="other" placeholder="طلب غير موجود في التصنيف" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label mt-4" for="basic-default-fullname">الكمية</label>
                                                        <input type="number" class="form-control" name="product_name" id="quantity" placeholder="11" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label mt-4" for="basic-default-fullname">احداثي الموقع</label>
                                                        <input type="text" class="form-control" name="product_name" id="coordinates" placeholder="33.4455455 , 44.5356567" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label mt-4" for="basic-default-fullname">رقم الاوردر</label>
                                                        <input type="text" class="form-control" name="product_name" id="order_number" placeholder="20" required />
                                                    </div>

                                                    <label class="form-label" for="basic-default-fullname">مصدر الطلب</label>
                                                    <select class="form-select" id="source" name="product_id">
                                                        <option>Select a Source</option>
                                                        <option>بغداد</option>
                                                        <option>الفرات الاوسط</option>
                                                        <option>المنطقة الجنوبية</option>
                                                        <option>المنطقة الشمالية</option>
                                                    </select>



                                                </div>


                                                <button type="submit" class="btn btn-primary">اضافة طلب</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <h4 class="fw-bold py-3 mb-4">ملاحظة/ <span class="text-muted fw-light">في حال اضافة الطلب الذهاب الى كل الطلبات وبعدها التاكد من صحة المعلومات المرسلة والضغط على زر اتمام الطلب</span></h4>
                        </div>


                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php include './inc/footer.php' ?>
</body>

</html>