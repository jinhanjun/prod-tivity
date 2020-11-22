
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type = "text/css">
    body {
    background: #1f6096;
    }

    .container {
      background: #1f6096;
      min-height: 100%;
      height: auto !important;
      height: 100%;
      margin: 0 auto -20px;
      padding: 20px;
    }
    
    .card-deck .card form{
      max-width: 99%;
      padding: 20px;
    } 
    </style>

    <title>Busy Bee</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <h3 style = "color: goldenrod;">Welcome to your Busy Bee Board!</h3>
          <li class="nav-item">
            <a class="nav-link " href="login/logoutinc.php" name = "logout">Logout</a>
          </li>
        </ul>
      </nav>


      <!-- this is the container -->
      <div class="container card-deck">
      <form class = "cardform"id = "submitform" action="postcard.php" method="post">
        <div class="col-sm-3 col-md-3 pb-2">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <label for = "new-todo">Todo:</label>
              <textarea id = "new-todo" rows = "3" class="form-control form-rounded" name="new-todo" type = "text" placeholder="Type in a task." contentEditable="true"></textarea>
                <br>
              <button type="submit" name = "addsubmit" class="btn btn-primary float-right">Add</button>
              <?php
            //   session_start();
            //   $servername = "us-cdbr-east-02.cleardb.com";
            //   $dBUsername = "bbce67deea96fe";
            //   $dBPassword = "aa0b3388";
            //   $dBName = "heroku_594dc794615938b";
            //   $username = $_SESSION['userUID'];
  
            //   // Create connection
            //   $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
            //   // Check connection
            //   if(!$conn){
            //       die("Connection failed: " .mysqli_connect_err());
            //   }
           
            //   if( isset($_POST['addsubmit'])){
            //         $newtodo = $_POST['new-todo'];
            //         $sql = "INSERT INTO prodcards (username, text) VALUES ('$username', '$newtodo')";
            //         mysqli_query($conn, $sql);
            //         mysqli_close($conn);

            //         echo '</div></div></div><div class="col-sm-3 col-md-3 pb-2">
            //         <div class="card" style="width: 18rem;">
            //         <div class="card-body">
            //         <p class="card-text">';
                    
            //         echo $newtodo["_message"];
                    
            //         echo '</p>
            //         <a href="#" class="float-right">Update</a>
            //         <a href="#" class="">Delete</a></div></div></div>';
            //   }
        
            ?>
            </div>
          </div>
        </div>
        </form>
      <?php
      session_start();
      $username = $_SESSION['userUID'];

 $servername = "aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dBUsername = "criar4b0z3v8vsbh";
$dBPassword = "mcjw7gey3e0sbow8";
$dBName = "k1d10389nz4l3bsk";

            // Create connection
            $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
            // Check connection
            if(!$conn){
                die("Connection failed: " .mysqli_connect_err());
            }

    // $sql = "SELECT cardtext FROM prodcards WHERE username='test';";  //This is where I specify what data to query
    // $result = $conn->query($sql);
    // echo json_encode($result);

    // $mysqli = new mysqli($servername, $dBUsername, $dBPassword, $dBName);
    // $result = $mysqli->query("SELECT cardtext FROM prodcards WHERE username='test';");
    // $rows = $result->fetch_assoc();
    // //echo htmlentities($row['_message']);
    // foreach($rows as $row){
    //     echo htmlentities($row);
        
    // }

    //$username = $_SESSION['username'];
    $q = "SELECT cardtext as _message, cardid as _id, cardtext as _text FROM prodcards WHERE username='$username';";
    $r = mysqli_query($conn, $q);



    while($page = mysqli_fetch_assoc($r)){ ?>

        <div class="col-sm-3 col-md-3 pb-2">
        <div class="card" style="width: 18rem;">
        <div id=<?php echo $page["_id"]?> class="card-body">
        <p class="card-text">
        
        <?php echo $page["_message"] ?>
        
        </p>
        <td><a href="header.php?edit=true&id=<?php echo $page["_id"]?>">Edit</a></td>


            <?php


                if(isset($_GET['edit']) && ($_GET['id']== $page["_id"])){?>
                      <form class = "cardform"id = "submitform" action="editcard.php?id=<?php echo $page["_id"]?>" method="post">
                    <textarea id = "new-todo" rows = "3" class="form-control form-rounded" name="new-todo" type = "text" placeholder="<?php echo $page["_text"]?>" contentEditable="true"></textarea>
                    <br>
                  <button type ="submit" href="">Add</button></form>
                <?php } ?>
        <a href="deletecard.php?id=<?php echo $page["_id"]?>">Delete</a></div></div></div>
   
    <?php } ?>    
    
    <script>
        renderedit($editid){
            <?php
            //echo('<textarea id = "new-todo" rows = "3" class="form-control form-rounded" name="new-todo" type = "text" placeholder="Type in a task." contentEditable="true"></textarea><br><button type="submit" name = "addsubmit" class="btn btn-primary float-right">Add</button>')
            ?>
        }

    </script>
       




        <!-- THIS IS THE CODE FOR THE CARD,,,, put this in the while loop
        <div class="col-sm-3 col-md-3 pb-2">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="">Delete</a>
            </div>
          </div>
        </div>
        ENDING DIV TAG FOR CARD ^^^ -->


        <!-- div tag below is for the container of cards  -->
      </div>
   
</body>
</html>
