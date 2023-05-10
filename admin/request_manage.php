<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<script>
    $(document).ready(function() {
        $(".request-table").DataTable({
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

</head>
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Requests/</span> Manage Requests</h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5 class="card-header">Request</h5>
                                <div class="card-datatable table-responsive pt-0">
                                    <table class=" request-table table border-top custom-table" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>Date Of Request</th>
                                                <th>Details Request</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">

                                            
                                                <?php
                                                $requests = mysqli_query($con, "SELECT * FROM invoice order by id desc");
                                                //     $con,
                                                // "SELECT ca.id , ca.coust_id , ca.customer_name , ca.quantity , ca.source , ca.req_from , ca.req_to , ca.coordinates , ca.date , c.Name_Category , p.product_name FROM cart ca  
                                                // INNER JOIN categories c ON ca.category_id = c.id
                                                // INNER JOIN products p ON ca.product_id = p.p_id
                                                // ORDER BY id DESC"



                                                $num = 1;
                                                while ($row = mysqli_fetch_assoc($requests)) {



                                                ?>
                                            <tr>

                                                <td><?php echo $num; ?></td>
                                                <td><?php echo $row['invoice_name'] ?></td>
                                                <td><?php echo $row['inovice_date'] ?></td>

                                                <td>
                                                    <a class="btn btn-info btn-xs" href="request_details.php?request=<?php echo $row['sub_id'] ?>">Details</a>




                                                <?php
                                                }




                                                ?>
                                                </td>


                                                <?php
                                                $num++;

                                                ?>
                                            </tr>
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