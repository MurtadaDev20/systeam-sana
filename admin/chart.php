    <?php
    // Retrieve data from the MySQL database
    $sql = "SELECT COUNT(*) as count, 
                CASE 
                    WHEN type = 'subr_name' THEN 'Internal'
                    WHEN type = 'name_recipient' THEN 'External'
                    ELSE 'Unknown Type' 
                END as label 
        FROM
                (SELECT 'subr_name' as type FROM completed_order
                UNION ALL
                SELECT 'name_recipient' as type FROM completed_order_external) as combined
        GROUP BY type";

    $result = mysqli_query($con, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    $chart_data = array();
    $chart_data[] = array('Type', 'Count');

    foreach ($data as $row) {
        $chart_data[] = array($row['label'], intval($row['count']));
    }


    $json_data = json_encode($chart_data);

    $js_code = <<<JS_CODE
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable($json_data);

        var options = {
            title: 'Internal Vs External',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>
    JS_CODE;

    ?>

    <?php
    // Retrieve data from the MySQL database using SQL join
    // $sql = "SELECT 
    //         COUNT(*) as count, 
    //         CASE 
    //             WHEN t1.type = 'supervisor' THEN 'Supervisor'
    //             WHEN t2.type = 'driver' THEN 'Driver'
    //             ELSE 'Unknown Type' 
    //         END as label 
    //     FROM 
    //         supervisor_table t1 
    //     JOIN 
    //         driver_table t2 
    //     ON 
    //         t1.supervisor_id = t2.supervisor_id 
    //     GROUP BY 
    //         t1.type, t2.type";
    // $result = mysqli_query($con, $sql);

    // Process the data into a format that can be used by Google Charts API
    // $data = array();
    // while ($row = mysqli_fetch_assoc($result)) {
    //     $data[] = array($row['label'], intval($row['count']));
    // }

    // Convert the data to a JSON-encoded string
    // $json_data = json_encode($data);

    // Generate the comparison chart
//     $js_code = <<<JS_CODE
//     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
//     <script type="text/javascript">
//         google.charts.load('current', {'packages':['corechart']});
//         google.charts.setOnLoadCallback(drawChart);

//         function drawChart() {
//             var data = new google.visualization.DataTable();
//             data.addColumn('string', 'Label');
//             data.addColumn('number', 'Count');
//             data.addRows($json_data);

//             var options = {
//                 title: 'Supervisor vs. Driver Comparison',
//                 is3D: true
//             };

//             var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
//             chart.draw(data, options);
//         }
//     </script>
// JS_CODE;

    // Output the chart to the HTML page
    // echo $js_code;
    ?>