<?php
include("dbConfig.php");
 
//getting id of the data from url
$ID = $_GET['ID'];
 
//deleting the row from table
$result = mysqli_query($db, "DELETE FROM categories WHERE ID=$ID");
 
//redirecting to the display page (index.php in our case)
header("Location:ls.php");
?>