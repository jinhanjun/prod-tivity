<?php

require "header.php";

$servername = "aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dBUsername = "criar4b0z3v8vsbh";
$dBPassword = "mcjw7gey3e0sbow8";
$dBName = "k1d10389nz4l3bsk";
$id = $_GET['id'];
$cardtext = $_POST['new-todo'];

// Create connection
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
// Check connection
if(!$conn){
    die("Connection failed: " .mysqli_connect_err());
}

$sql = "UPDATE prodcards SET cardtext = '$cardtext' WHERE cardid ='$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);
//header("Refresh:0");
header('Refresh: 1; url=header.php');
exit();


?>
