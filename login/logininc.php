<?php

if(isset($_POST['loginsubmit'])){

    require "dbhinc.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($password)){
        // header("Location: ../signup.php?error=emptyfields");
        // exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE username=?; ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../open.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == false){
                    header("Location: ../open.php?error=wrongpassword");
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['userID'] = $row['idusers'];
                    $_SESSION['userUID'] = $row['username'];
                    $name = $row['fullname'];
                    $major = $row['usermajor'];

                    header("Location: ../header.php?login=success&fullname=".$name."&majorname=".$major."&username=".$username);
                    exit();

                }
                else{
                    header("Location: ../open.php?error=wrongpassword");
                    exit();
                }
            }
            else {
                header("Location: ../open.php?error=nouser");
                exit();
            }
        }

    }
}
else {
    header("Location: ../open.php");
    exit();
}
