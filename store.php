<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "inventory_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch all products from the database
function getProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $products = array();
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    } else {
        return array();
    }
}

// Example usage: Fetch all products
$products = getProducts($conn);
if (!empty($products)) {
    foreach ($products as $product) {
        echo "Product ID: " . $product['id'] . "<br>";
        echo "Name: " . $product['name'] . "<br>";
        echo "Description: " . $product['description'] . "<br>";
        echo "Price: $" . $product['price'] . "<br>";
        echo "Quantity: " . $product['quantity'] . "<br><br>";
    }
} else {
    echo "No products found.";
}

// Close connection
$conn->close();
?>

