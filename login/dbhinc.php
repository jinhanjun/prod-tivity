<?php

$servername = "us-cdbr-east-02.cleardb.com";
$dBUsername = "bbce67deea96fe";
$dBPassword = "aa0b3388";
$dBName = "logindatabase";

$conn = mysqli_connect($servername,$dBUsername, $dBPassword, $dBName );
if(!$conn){
    die("Connection failed: " .mysqli_connect_err());
}