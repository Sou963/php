<?php

$connection = new mysqli("localhost", "root", "", "cma01");
if (!$connection) {
    die("error connection" . mysqli_error($connection));
}
$receive = $_REQUEST["id"];
$query = "DELETE FROM first WHERE id=$receive";
$delete_data = mysqli_query($connection,$query);
if ($delete_data) {
    header("location:show.php?deleted");
}
?>