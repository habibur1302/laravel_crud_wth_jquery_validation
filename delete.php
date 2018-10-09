<?php

include 'database.php';
$id=$_GET['id'];
$q=" DELETE FROM `info` WHERE id=$id ";
mysqli_query($db, $q);
header('location:display.php');

?>