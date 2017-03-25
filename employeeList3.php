<?php
//filename:function-library.php
include "function-library.php";

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
//url 01.readdatabase.php?lastname=J&age32

$lname = getOption("lastname", '');
$age = getOption("age", 0);
$salary = getOption("salary", 0);

if (isset($_GET["lastname"])) {
    $lname = $_GET["lastname"];
}
// Display Project salary field add salary as a parameter;  &salary=40000
// example the folowing parameter will display data greater

if ($lname == "") {
    $where = "1 = 1";
} else {
    $where = "lastname like '$lname%'";
}

$where = $where . " AND age >=$age AND salary >=$salary";

$sql = "SELECT id, firstname, age, lastname, salary
        FROM employees
        where $where
        ORDER by lastname";
echo $sql;

$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">
<head>
    <!--    filename employeeList2.php-->
    <meta charset="UTF-8">
    <title>Page Title </title>
    <link rel="stylesheet" type="text/css" href="them.css">
</head>
<body>
<h1>Display all Employee 2</h1>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $broke = $row["salary"] < 60000 ? "broke": "";
        ?>
        <div class="row">
            <span class="col1"><?= $row["lastname"] .",". $row["firstname"] ?></span>
            <span class="col2">
            <img src=start.png style="width: 10px;
            height: 10px;">
            </span>


        </div>
    <?php }
    $conn->close();
} ?>

</body>
</html>