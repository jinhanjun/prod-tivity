<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body {
            background: #463b93;
        }

        .container {
            background: #463b93;
            min-height: 100%;
            height: auto !important;
            height: 100%;
            margin: 0 auto -20px;
            padding: 20px;
        }

        .card-deck .card form {
            max-width: 100%;
            /* padding: 20px; */
        }
    </style>

    <title>Busy Bee</title>
</head>

<body>
    <div class="navbar shadow-lg " style="background-color: #262a2b ">
        <a class="navbar-brand" style=" color: white;">
            <img src="https://img.icons8.com/nolan/64/bee.png" />
            <strong> Busy Bee </strong>
        </a>

        <a style = "color: #808184;" class="nav-link " href="login/logoutinc.php" name="logout">Logout</a>

    </div>

    <?php
    //REST API START
    function call_api($method, $url, $data = false,$api_key="_9A3UF457b8_wDR2Vr7W_QeF")
    {
        $curl = curl_init();

        switch ($method)
        {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        $headers = [
        'Content-Type: application/json'
        ];
        if ( !empty($api_key))
        $headers[] = 'X-TheySaidSo-Api-Secret: '. $api_key;

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    $qod_result = call_api("GET","https://quotes.rest/qod?category=inspire",false,"_9A3UF457b8_wDR2Vr7W_QeF");
    $encode = json_decode($qod_result, true);
    $quote = $encode;

    //DISPLAY QUOTE AND AUTHOR

    // echo '<ul>';
    // // echo $qod_result;
    // echo $quote['contents']['quotes'][0]['quote'];
    // echo ' Author: ';
    // echo $quote['contents']['quotes'][0]['author'];
    // echo '</ul>';

    //REST API END
    ?>

    <!-- this is the container -->
    <div class="container card-deck">

    <?php
    
    session_start();
    $username = $_SESSION['userUID'];
    ?>

        <form class="cardform" id="submitform" action="postcard.php?uid=<?php echo $username?>" method="post">
            <div class="col-sm-3 col-md-3 pb-2">
                <div class="card" style="width: 32rem;">
                    <div class="card-body">
                        <label for="new-todo">Todo:</label>
                        <textarea id="new-todo" rows="3" class="form-control form-rounded" name="new-todo" type="text"
                            placeholder="Type in your task." contentEditable="true"></textarea>
                        <br>
                        <button type="submit" name="addsubmit" class="btn btn-warning float-right ">+ Add</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-sm-3 col-md-3 pb-2">
                <div class="card" style="width: 30.9rem; height: 14rem; background-color: #aab9fe;">
                    <div class="card-header">
                    <h4>Inspirational Quote of the Day</h4>
                    </div>
                    <div class="card-body">
                    
                    <?php 
                    echo '<ul><h6>"';
                    echo $quote['contents']['quotes'][0]['quote'];
                    echo '"</h6>';
                    echo ' ––– ';
                    echo $quote['contents']['quotes'][0]['author'];
                    echo '</ul>';
                    ?>

                    <!-- echo '<ul>';
                    echo 'Vision without action is daydream. Action without vision is nightmare..';
                    echo '<br>';
                    echo ' ––– ';
                    echo 'Japanese Proverb';
                    echo '</ul>';
                     -->
                   
                    </div>
                </div>
        </div>
        
        <?php


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

          $q = "SELECT cardtext as _message, cardid as _id, cardtext as _text FROM prodcards WHERE username='$username';";
          $r = mysqli_query($conn, $q);



    while($page = mysqli_fetch_assoc($r)){ 
        $cardtext = $page["_message"];
        $cardid = $page["_id"];
        ?>
        <div class="col-sm-3 col-md-3 pb-2">
            <div class="card" style="width: 15rem; background-color: white;">
                <div class="card-body">
                    <p class="card-text">

                        <?php echo $cardtext ?>

                    </p>
                    <td><a class="btn btn-outline-success float-left" href="header.php?edit=true&id=<?php echo $cardid?>">Edit</a></td>

                    <?php


                if(isset($_GET['edit']) && ($_GET['id']== $page["_id"])){?>
                    <form class="cardform" id="submitform" action="editcard.php?id=<?php echo $cardid?>&cardtext=<?php echo $cardtext?>"
                        method="post">
                        <br>
                        <textarea id="new-todo" rows="3" class="form-control form-rounded" name="new-todo" type="text"
                             contentEditable="true"><?php echo $cardtext?></textarea>
                        <br>
                        <button class = "btn btn-primary float-left" type="submit" href="">Update</button></form>
                    <?php } ?>
                    <a class="btn btn-danger float-right" href="deletecard.php?id=<?php echo $cardid?>">Delete</a>

                    <!-- <button type="submit" name="addsubmit" class="btn btn-warning float-right ">+ Add</button> -->
                </div>
            </div>
        </div>


        <?php } ?>



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

    <footer style="      
    background-color: #262a2b;" class="footer text-center py-3 page-footer fixed-bottom">

        <a style="text-decoration: none; color: white;" href="https://icons8.com/icon/vn5qFmwrStFg/bee">Bee icon by
            Icons8</a>

    </footer>

</body>

</html>
