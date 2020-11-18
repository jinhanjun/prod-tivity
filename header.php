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
          <a href="#"> Boards</a>
          <a href="#">Contributors</a>
        </div>
        <div class="nav--right">
        <?php
        if(isset($_SESSION['username'])){
            echo '<a href="open.php" name="logout">Login</a>';
        }
        else {
            echo '<a href="login/logoutinc.php" name="logout">Logout</a>';;

        }
        ?>
          
        </div>
      </nav>
      <header><h1>Welcome to your board!</h1></header>
      <br /> <br />
      <div class="container">

      </div>  
        
    </div>
  </body>
</html>

<script>
  alert(document.getElementById("temporaryusername").value )
  document.getElementById("temporaryusername").value = document.getElementById("username").value;
</script>