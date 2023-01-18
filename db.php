<?php

// Connect to the database
$host = "localhost";
$username = "root";
$password = "Mer@Data6ase";
$dbname = "spire";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check for connection error
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the address data from the form
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

// Escape the data to prevent SQL injection
$address_line1 = mysqli_real_escape_string($conn, $address_line1);
$address_line2 = mysqli_real_escape_string($conn, $address_line2);
$city = mysqli_real_escape_string($conn, $city);
$state = mysqli_real_escape_string($conn, $state);
$zip = mysqli_real_escape_string($conn, $zip);

// Build the SQL query
$sql = "INSERT INTO addresses (address_line_1, address_line_2, city, state, zip) VALUES ('$address_line1', '$address_line2', '$city', '$state', '$zip')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Address saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

?>
