<?php
include("dbConfig.php");
 
//getting id of the data from url
$PID = $_GET['PID'];
 
//deleting the row from table
$result = mysqli_query($db, "DELETE FROM products WHERE PID=$PID");
 
//redirecting to the display page (index.php in our case)
header("Location:list_product.php");
?>