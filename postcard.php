<?php

if(isset($_POST['addsubmit'])){
  //require "header.php";

  $servername = "aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
  $dBUsername = "criar4b0z3v8vsbh";
  $dBPassword = "mcjw7gey3e0sbow8";
  $dBName = "k1d10389nz4l3bsk";
  $username = $_GET['uid'];

  // Create connection
  $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
  // Check connection
  if(!$conn){
      die("Connection failed: " .mysqli_connect_err());
  }else{

      $newtodo = $_POST['new-todo'];
        $sql = "INSERT INTO prodcards (username, cardtext) VALUES ('$username', '$newtodo')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        //header("Refresh:3");
        //header('Refresh: 0; url=header.php');
        //header("Location: header.php?add=true");
        //header('Refresh: 1; url=header.php');
      //exit();
      header("Location: header.php");
      exit();

  } 
}else{
  header("Location: header.php");
  exit();
}

