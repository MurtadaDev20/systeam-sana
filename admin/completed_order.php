<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
<script>
    $(document).ready(function() {
        $(".internal").DataTable({
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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History/</span> Complet Order </h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5 class="card-header">Complet Order</h5>
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="internal table border-top custom-table" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Driver Name</th>
                                                <th>Suprvisor Name</th>
                                                <th> From</th>
                                                <th> To</th>
                                                <th> From To</th>
                                                <th> Kilometer Counter</th>
                                                <th> Kerosene Before</th>
                                                <th> kerosene After</th>
                                                <th> kerosene Price</th>
                                                <th> Overnight Expenses</th>
                                                <th> Other Expenses</th>
                                                <th> Total Expenses</th>
                                                <th> Request Date </th>
                                                <th> Received Date</th>
                                                <th> Delivery Date</th>
                                                <th> Starting Date </th>
                                                <th> Num Hours </th>
                                                <th> Report </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">


                                            <?php
                                            $supervisor = mysqli_query($con, "SELECT * FROM `completed_order` ORDER BY `id` DESC");
                                            $num = 1;
                                            while ($row = mysqli_fetch_assoc($supervisor)) {

                                                $datetime1 = new DateTime($row['received_date']);
                                                $datetime2 = new DateTime($row['delivery_date']);
                                                $interval = $datetime1->diff($datetime2);
                                            ?>
                                                <tr>

                                                    <td><?php echo $num++; ?></td>
                                                    <td><?php echo $row['driver_name'] ?></td>
                                                    <td><?php echo $row['subr_name'] ?></td>
                                                    <td><?php echo $row['from'] ?></td>
                                                    <td><?php echo $row['to'] ?></td>
                                                    <td><?php echo $row['from_to'] ?></td>
                                                    <td><?php echo $row['Kilometer'] ?></td>
                                                    <td><?php echo $row['kerosene_before'] ?></td>
                                                    <td><?php echo $row['kerosene_after'] ?></td>
                                                    <td><?php echo $row['kerosene_price'] ?></td>
                                                    <td><?php echo $row['overnight_expenses'] ?></td>
                                                    <td><?php echo $row['other_expenses'] ?></td>
                                                    <td><?php echo $row['total_expenses'] ?></td>
                                                    <td><?php echo $row['date_request'] ?></td>
                                                    <td><?php echo $row['received_date'] ?></td>
                                                    <td><?php echo $row['delivery_date'] ?></td>
                                                    <td><?php echo $row['start_date'] ?></td>
                                                    <td><?php echo $interval->h ?></td>
                                                    <td>
                                                        <a href="show_upload.php?show=<?php echo $row['id'] ?>"><?php echo $row['file'] ?></a>
                                                    </td>
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