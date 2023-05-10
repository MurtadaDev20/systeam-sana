<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
<style>
    .show {
        background-color: white;
        border-radius: 20px;
        box-shadow: 0px 6px 20px 0px gray;
    }


    .show_image {
        width: 100%;
        border-radius: 20px;
        text-align: center;
        padding: 20px;
        height: 100%;
    }



    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 59px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }

    .download {
        width: 100px;
        margin: 20px;
    }
</style>
<?php
if (isset($_GET['show']) && !empty($_GET['show'])) {
    $count = 0;
    global $con;
    $show = $_GET['show'];
    $query = mysqli_query($con, "SELECT * FROM completed_order_external where id = '$show'");
    $query_compl = mysqli_query($con, "SELECT * FROM completed_order where id = '$show'");


    $row_image = mysqli_fetch_assoc($query);
    $row_compl = mysqli_fetch_assoc($query_compl);

    // $received_date = $row_accept['date'];
    // $rej_id = $row_rej['sub_id'];
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



                        <div class="row">

                            <div class="col-sm-5">
                                <img id="myImg" src="./uploads/<?php echo $row_image['file'] ?>" style="width:200px;max-width:100%">
                                <div id="myModal" class="modal">
                                    <span class="close">&times;</span>
                                    <img class="modal-content" id="img01" src="./uploads/<?php echo $row_image['file'] ?>">
                                    <div id="caption"></div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-5">
                                    <img id="myImg1" src="./uploads/<?php echo $row_compl['file'] ?>"  style="width:200px;max-width:100%">
                                    <div id="myModal" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img01" src="./uploads/<?php echo $row_compl['file'] ?>">
                                        <div id="caption"></div>
                                    </div>

                                </div>


                                <!-- <div class="col-sm-5 show">
                                <img class="show_image" src="./uploads/<?php
                                                                        // echo $row_image['file'] 
                                                                        ?>" alt="">
                            </div> -->
                            </div>
                            <!-- <a class="btn btn-outline-primary download" s href="./uploads/<?php echo $row_compl['file'] ?>">Download</a> -->

                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg");
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");
                            img.onclick = function() {
                                modal.style.display = "block";
                                modalImg.src = this.src;
                                captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                                modal.style.display = "none";
                            }
                        </script>

                        <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg1");
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");
                            img.onclick = function() {
                                modal.style.display = "block";
                                modalImg.src = this.src;
                                captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                                modal.style.display = "none";
                            }
                        </script>
                        <?php include './inc/footer.php' ?>
</body>

</html>