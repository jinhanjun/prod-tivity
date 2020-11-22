<?php

require "header.php";

$servername = "us-cdbr-east-02.cleardb.com";
$dBUsername = "bbce67deea96fe";
$dBPassword = "aa0b3388";
$dBName = "heroku_594dc794615938b";
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
