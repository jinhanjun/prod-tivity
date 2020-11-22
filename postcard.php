<?php

require "header.php";

$servername = "us-cdbr-east-02.cleardb.com";
$dBUsername = "bbce67deea96fe";
$dBPassword = "aa0b3388";
$dBName = "heroku_594dc794615938b";
$username = $_SESSION['userUID'];

// Create connection
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
// Check connection
if(!$conn){
    die("Connection failed: " .mysqli_connect_err());
}


      $newtodo = $_POST['new-todo'];
      $sql = "INSERT INTO prodcards (username, cardtext) VALUES ('$username', '$newtodo')";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      header("Location: header.php?upload=success");
    exit();


?>
