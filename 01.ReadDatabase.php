<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "employeedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//url 01.readdatabase.php?lastname=J
//url 01.readdatabase.php

$lname = "All";
if (isset($_GET["lastname"])){
    $lname = $_GET["lastname"];
}

$where = "lastname LIKE '$lname%'";
$sql = "SELECT id, firstname, age, lastname 
        FROM employees
        where $where
        ORDER by lastname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]
                    . " - Name: "
                    . $row["firstname"]
                    . " "
                    . $row["lastname"]
                    . " "
                    . $row["age"]
                    ."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>