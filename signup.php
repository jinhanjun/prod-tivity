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
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfbkuQZAAAAAEYx3CAJz2dgr7m8LT_2h-CacyuY"></script>


    <title>Productivity Board</title>
  </head>
  <body>
    <div class="ui">
      <nav>
        <div class="nav--left">
          <a style="color:white;"> Welcome to your personalized board!</a>

        </div>

        <div class="nav--right">
          <a href="open.php" name="logout" style="color:white;">Login</a>
        </div>
      </nav>
      <header><h1>SIGN UP</h1></header>
      <?php
        if(isset($_GET['error'])){
            if($_GET['error']== "usertaken"){
                echo '<h1>User already exists.</h1>';

            } else if($_GET['error']== "emptyfields"){
                echo '<h1>A field was left empty.</h1>';

            }else if($_GET['error']== "sqlerror"){
                echo '<h1>Database error</h1>';

            }
            echo '<h1> Please try again</h1>';
        } else if (isset($_GET['signup'])== "success") {
            echo '<h1>SUCCESS!</h1>';
            echo '<a href="header.php"><button style="width: 10%; background-color: #0067a3; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;"type="submit" >Enter</button></a>';

        }
      ?>
      <br /> <br />
      <form id = "submitform" action="login/signupinc.php" method="post" >
                        <input style="width: 25%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="username" type = "text" placeholder="Username" >
                        <input style="width: 25%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="password" type = "text" placeholder="Password" >
                        <input style="width: 25%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="password2" type = "text" placeholder="Repeat Password" >

                        <br /> <br />
                        <button style="width: 10%; background-color: #0067a3; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;"type="submit" name="signupsubmit">Signup</button>
                        </form>
                        <br /> <br />
                        <div class="field">
                            <div class="control">
                                
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