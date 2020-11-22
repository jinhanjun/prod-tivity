<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="login.css" />

    <title>Busy Bee</title>
</head>

<body>
    <div class="ui" style="background-color: #463b93">

        <!-- NAV BAR -->
        <div class="navbar shadow-lg " style="background-color: #262a2b ">
          <a class="navbar-brand" >
          <img src="https://img.icons8.com/nolan/64/bee.png"/>
          <strong> Busy Bee </strong>
          </a>
        </div>




        <br /> <br />
        <div class="col-lg-6 col-md-8 mx-auto">
            <div id="logincard" class="card rounded shadow shadow-sm">
                <div class="card-header">
                    <h3 class="mb-0">Welcome!</h3>
                </div>
                <div class="card-body">
                    <form action="login/logininc.php" method="post">

                        <label for="userbox">Username</label>
                        <input id="userbox" class="form-control form-control-lg form-rounded" name="username"
                            type="text" placeholder="Username">

                        <br />
                        <label for="pwbox"> Password </label>
                        <input id="pwbox" class="form-control form-control-lg form-rounded" name="password" type="text"
                            placeholder="Password">

                        <br />

                        <button id="loginbutton" class="btn btn-primary btn-lg float-left form-rounded" type="submit"
                            name="loginsubmit">Login <i class="fa fa-sign-in"></i></button>

                        <div class="float-right">
                            <?php
            
              if(isset($_GET['error'])){
                  if($_GET['error']== "wrongpassword"){
                      echo '<p class ="loginMSG">Wrong password. Please try again. </p>';

                  } else if($_GET['error']== "nouser"){
                      echo '<p class ="loginMSG">No such username exists. Please try again.</p>';

                  }else if($_GET['error']== "sqlerror"){
                      echo '<p class ="loginMSG">Database error. Please try again.</p>';

                  }
              } else if (isset($_GET['signup'])== "success") {
                  echo '<p style = "color: green;"> Success! Logging you in. </p>';
                  // echo '<a href="header.php"><button class="btn btn-primary btn-lg float-right" type="submit" >Enter</button></a>';
              }
            ?>
                        </div>
                    </form>
                </div>

                <br />

                <div class="card-footer">
                    <p>Haven't created an account yet? <a id="signuplink" href="signup.php" name="signup">Sign Up</a>
                    </p>
                </div>


                <div class="field">
                    <div class="control">
                </div>


                </div>
                
            </div>
        </div>

    </div>
    
      <footer class="page-footer font-small blue" style = "background-color: #262a2b">

  
      <div class="footer-copyright text-center py-3" style="background-color: #262a2b color:">
        <!-- © 2020 Copyright: -->
      
        <a style = "text-decoration: none; color: white;" href="https://icons8.com/icon/vn5qFmwrStFg/bee">Bee icon by Icons8</a>
      </div>
      

      </footer>
      
</body>

</html>
