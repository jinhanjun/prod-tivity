<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <script src="board.js"></script>
    <script type = "module" src="app.js"></script>
    <title>Productivity Board</title>
  </head>
  <body>
    <div class="ui">
      <nav>
        <div class="nav--left">
          <a style="color:white;"> Welcome to your personalized board!</a>

        </div>

        <div class="nav--right">

        </div>
      </nav>
      <header><h1>Welcome! Please log in.</h1></header>
      <br /> <br />
      <?php
        if(isset($_GET['error'])){
            if($_GET['error']== "wrongpassword"){
                echo '<h1>Wrong password.</h1>';

            } else if($_GET['error']== "nouser"){
                echo '<h1>No such username exists.</h1>';

            }else if($_GET['error']== "sqlerror"){
                echo '<h1>Database error</h1>';

            }
            echo '<h1> Please try again</h1>';
        } else if (isset($_GET['signup'])== "success") {
            echo '<h1>SUCCESS!</h1>';
            echo '<a href="header.php"><button style="width: 10%; background-color: #0067a3; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;"type="submit" >Enter</button></a>';

        }
      ?>
      <form action="login/logininc.php" method="post" >
                        <input style="width: 25%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="username" type = "text" placeholder="Username" >
                        <input style="width: 25%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="password" type = "text" placeholder="Password" >
                        <br /> <br />
                        <button style="width: 10%; background-color: #0067a3; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;"type="submit" name="loginsubmit">Login</button>
                        </form>
                        <br /> <br />
                        <a href="signup.php" name="signup"><button style="width: 10%; background-color: #0067a3; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;"type="submit" name="signupsubmit">Signup</button></a>
                        <div class="field">
                            <div class="control">
                                
                            </div>

                        </div>



        
    </div>
  </body>
</html>
