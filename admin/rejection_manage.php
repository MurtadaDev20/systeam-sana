<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>

<script>
    $(document).ready(function() {
        $(".rejection-manage").DataTable({
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Rejection/</span> Regection Manage </h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card ">
                                <!-- <h5 class="card-header">Supervisors</h5> -->
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="rejection-manage table border-top custom-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Driver Name</th>
                                                <th>Phone</th>
                                                <th>Regection</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">


                                            <?php
                                            $query_select_rejection = mysqli_query($con, ("SELECT * FROM rejection_driver "));

                                            $num = 1;
                                            while ($row = mysqli_fetch_assoc($query_select_rejection)) {
                                            ?>
                                                <tr>

                                                    <td><?php echo $num; ?></td>
                                                    <td><?php echo $row['name_driver'] ?></td>
                                                    <td><?php echo $row['phone'] ?></td>
                                                    <td><?php echo $row['text'] ?></td>
                                                    <td><?php echo $row['date'] ?></td>

                                                    <td>
                                                        <a class="btn btn-danger btn-xs" href="rejection_driver_delete.php?rejection_driver_delete=<?php echo $row['id'] ?>">حذف</a>

                                                    </td>
                                                <?php
                                                $num++;
                                            }
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