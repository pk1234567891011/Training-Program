<?php
include "dbConfig.php";
//getting id of the data from url
$ID = $_GET['ID'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM categories WHERE ID=$ID");
session_start();

if ($result) {
    $_SESSION["delete"] = "";
    header("Location:list_category.php");

} else {
    $_SESSION["error_del"] = "";
    header("Location:list_category.php");
}

//redirecting to the display page (index.php in our case)
