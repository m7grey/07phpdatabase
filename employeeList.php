<!doctype html>
<html lang="en">
<head>
    <!--    filename employeeList.php-->
    <meta charset="UTF-8">
    <title>Page Title </title>
    <link rel="stylesheet" type="text/css" href="them.css">
</head>
<body>
<h1>Display all Employee</h1>
<?php for ($i = 1; $i < 100; $i++) { ?>
<div class="row">
    <span class="col1">lastName, firstName</span>
    <span class="col2">salary</span>
</div>
<?php } ?>

</body>
</html>