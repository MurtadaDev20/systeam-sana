<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "sana");


// Query the categories table
$result = $mysqli->query("SELECT * FROM categories");

// Loop through the categories and add them to an array
$categories = array();
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

// Query the products table
$result = $mysqli->query("SELECT * FROM products");

// Loop through the products and add them to an array
$products = array();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Combine the categories and products arrays into a single array
$data = array("categories" => $categories, "products" => $products);

// Convert the data to JSON and output it
echo json_encode($data);
