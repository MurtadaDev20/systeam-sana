<?php include './function/config.php' ?>
<?php include './inc/header.php' ?>
<?php
// Connect to the database


// Check if the form has been submitted
if ( isset($_POST["category_id"]) && isset($_POST["product_id"]) && isset($_POST["from"]) && isset($_POST["to"]) && isset($_POST["quantity"]) && isset($_POST["source"])) {
    // Sanitize the input
    $category_id = $_POST["category_id"];
    $product_id = $_POST["product_id"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $other = $_POST["other"];
    $quantity = $_POST["quantity"];
    $source = $_POST["source"];
    $coordinates = $_POST["coordinates"];
    $order_number = $_POST["order_number"];
    // Insert the order into the database
    $result = mysqli_query($con, "INSERT INTO cart (customer_name, coust_id , category_id, product_id ,quantity , source , req_from , req_to ,other, coordinates , order_number) 
    VALUES 
    ('$_SESSION[fullName]','$_SESSION[coust_id]', '$category_id', '$product_id' , '$quantity' , '$source' , '$from' , '$to' , '$other' , '$coordinates' , '$order_number')");

    // Check for errors
    if (!$result) {
        echo "Error: " . $mysqli->error;
        exit();
    }

    // Output a success message
    echo "Order placed successfully!";
} else {
    // Output an error message
    echo "Error: Form not submitted!";
}


