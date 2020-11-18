<?php require "header.php";
?>
<main>
    <?php
        if(isset($_SESSION['username'])){
            echo "<p>You're logged in</p>";
        }
        else {
            echo "<p>You're logged out</p>";

        }
        ?>
    

</main>


<?php require "footer.php";
?>