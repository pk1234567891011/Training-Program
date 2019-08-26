<?php
include "dbConfig.php";

//getting id of the data from url
$PID = $_GET['PID'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM products WHERE PID=$PID");
session_start();
if ($result) {
    $_SESSION["delete"] = "";
    header("Location:list_product.php");

} else {
    $_SESSION["error_del"] = "";
    header("Location:list_product.php");
}

//redirecting to the display page (index.php in our case)
