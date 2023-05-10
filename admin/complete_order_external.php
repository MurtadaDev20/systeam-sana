<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
</head>
<script>
    $(document).ready(function() {
        $(".external").DataTable({
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History/</span> Complet Order External</h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5 class="card-header">Complet Order</h5>
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="external table border-top custom-table" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name Recipient</th>
                                                <th>From</th>
                                                <th> To</th>
                                                <th> Price</th>
                                                <th> Product Name</th>
                                                <th> Order Number </th>
                                                <th> Type Machanism </th>
                                                <th> Report</th>
                                                <th> Date </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">

                                            
                                                <?php
                                                $supervisor = mysqli_query($con, "SELECT * FROM `completed_order_external` ORDER BY `id` DESC");
                                                $num = 1;
                                                while ($row = mysqli_fetch_assoc($supervisor)) {



                                                ?>
                                            <tr>

                                                <td><?php echo $num; ?></td>
                                                <td><?php echo $row['name_recipient'] ?></td>
                                                <td><?php echo $row['from_ex'] ?></td>
                                                <td><?php echo $row['to_ex'] ?></td>
                                                <td><?php echo $row['price'] ?></td>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['order_number'] ?></td>
                                                <td><?php echo $row['type_mechanism'] ?></td>
                                                <td>
                                                    <a href="show_upload.php?show=<?php echo $row['id'] ?>"><?php echo $row['file'] ?></a>
                                                </td>
                                                <td><?php echo $row['date'] ?></td>

                                            </tr>
                                        <?php
                                                }
                                        ?>
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