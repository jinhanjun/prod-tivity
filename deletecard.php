<?php

require "header.php";

$servername = "us-cdbr-east-02.cleardb.com";
$dBUsername = "bbce67deea96fe";
$dBPassword = "aa0b3388";
$dBName = "heroku_594dc794615938b";
$id = $_GET['id'];

// Create connection
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
// Check connection
if(!$conn){
    die("Connection failed: " .mysqli_connect_err());
}

$sql = "DELETE FROM prodcards WHERE cardid ='$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);
//header("Refresh:0");
header('Refresh: 1; url=header.php');
exit();


?>
