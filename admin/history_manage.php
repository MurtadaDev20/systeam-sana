<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
<script>
    $(document).ready(function() {
        $(".rejection").DataTable({
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History/</span> Manage History</h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5 class="card-header">Supervisors</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="rejection  table border-top custom-table" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> Name</th>
                                                <th> Text</th>
                                                <th> Date</th>
                                                <th> status</th> 
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">


                                            <?php
                                            $supervisor = mysqli_query($con, "SELECT * FROM `history` ORDER BY `id` DESC");
                                            $num = 1;
                                            while ($row = mysqli_fetch_assoc($supervisor)) {



                                            ?>
                                                <tr>

                                                    <td><?php echo $num; ?></td>
                                                    <td><?php echo $row['coust_name'] ?></td>
                                                    <td><?php echo $row['text_rejection'] ?></td>
                                                    <td><?php echo $row['date'] ?></td>
                                                    <?php
                                                    if ($row['status'] == 0) {
                                                    ?>
                                                        <td class="p-3 mb-2  text-danger text-center fw-bolder"><?php

                                                                                                                echo "Rejection";
                                                                                                            }
                                                                                                                ?>
                                                        </td>
                                                        <?php
                                                        if ($row['status'] == 1) {
                                                        ?>
                                                            <td class="p-3 mb-2  text-success text-center fw-bolder"><?php

                                                                                                                        echo "Done";
                                                                                                                    }
                                                                                                                        ?></td>




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