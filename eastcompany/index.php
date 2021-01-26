<?php
    include_once('Data.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eastcompany</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>EastCompany</h1>
    <?php 
    $limit = 0;
    if (isset($_GET['limit'])  ) {
    	$limit = $_GET['limit'];
    }
    else {
        $limit = 10;
    }
    Data::main($limit);
    ?>    
</div>    
</body>
</html>