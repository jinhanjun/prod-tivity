<?php

$servername = "aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dBUsername = "criar4b0z3v8vsbh";
$dBPassword = "mcjw7gey3e0sbow8";
$dBName = "k1d10389nz4l3bsk";

$conn = mysqli_connect($servername,$dBUsername, $dBPassword, $dBName );
if(!$conn){
    die("Connection failed: " .mysqli_connect_err());
}
