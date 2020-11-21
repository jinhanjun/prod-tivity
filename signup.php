<?php 
	if(isset($_POST['postform'])) {
		print_r($_POST);
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6LfbkuQZAAAAAARmhu4lY4ZGbgrJiVv-HK9vSuHg",
			'response' => $_POST['token'],
			// 'remoteip' => $_SERVER['REMOTE_ADDR']
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success'] == true) {

			// Perform you logic here for ex:- save you data to database
  			echo '<div class="alert alert-success">
			  		<strong>Success!</strong> Your inquiry successfully submitted.
		 		  </div>';
		} else {
			echo '<div class="alert alert-warning">
					  <strong>Error!</strong> You are not a human.
				  </div>';
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="signup.css"/>

    <script src="board.js"></script>
    <script type = "module" src="app.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfbkuQZAAAAAEYx3CAJz2dgr7m8LT_2h-CacyuY"></script>


    <title>Productivity Board</title>

  </head>


  <body>
    <div class="ui">
      <nav>
        <div class="nav--left">
          <a style="color:white;"> Welcome to Prod-tivity!</a>

        </div>

        <!-- <div class="nav--right">
          <a href="open.php" name="logout" style="color:white;">Login</a>
        </div> -->
      </nav>  
      <br /> <br /> 
         
      <div class="col-lg-6 col-md-8 mx-auto">
        <div id = "signupcard" class = "card rounded shadow shadow-sm"> 
            <div class="card-header">
              <h3 class="mb-0">Sign Up Here</h3>
            </div>

            <div class="card-body">
              <form id = "submitform" action="login/signupinc.php" method="post">
                  <label for="signupub">Username</label>
                  <input id = "signupub" class="form-control form-control-lg form-rounded" name="username" type = "text" placeholder="Create a username" >
                  
                  <br>

                  <label for="signuppass">Password</label>
                  <input id = "signuppass" class="form-control form-control-lg form-rounded" name="password" type = "text" placeholder="Create your password" >
                      
                  <br /> 
                  <label for="signuppass2">Re-enter Your Password</label>
                  <input id = "signuppass2" class="form-control form-control-lg form-rounded" name="password2" type = "text" placeholder="Repeat password" >

                  <br />
                  <button id = "submitsignup" class="btn btn-success btn-lg float-left" type="submit" name="signupsubmit">Signup</button>
              </form>
            
              <div class = "float-right">
              
              <?php
                if(isset($_GET['error'])){
                    if($_GET['error']== "usertaken"){
                        echo '<p class = "superror">Username is already taken. Please try again.</p>';

                    } else if($_GET['error']== "emptyfields"){
                        echo '<p class = "superror">A field was left empty. Please try again.</p>';

                    }else if($_GET['error']== "sqlerror"){
                        echo '<p class = "superror">Database error. Please try again.</p>';
                    }
                } else if (isset($_GET['signup'])== "success") {
                  echo '<p style = "color: green;"> Success!  Return to Login to sign in. </p> ';
                  echo '<a href="header.php"><button class="btn btn-primary btn-lg float-right" type="submit" >Enter</button></a>';

                }
              ?> 
              
              </div>
            </div>


          <br />

          <div class = "card-footer">
          <p>Already Have an Account? Return back to  <a id = "loginlink" href="open.php" name="logout" >Login.</a></p>
          </div>

          <div class="field">
              <div class="control">                
              </div>
          </div>
        
        </div>
      </div>
    </div>
    


  <script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6LfbkuQZAAAAAEYx3CAJz2dgr7m8LT_2h-CacyuY', {action: 'homepage'}).then(function(token) {
         // console.log(token);
         document.getElementById("token").value = token;
      });
  });
  </script>

    
  </body>
</html>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>

