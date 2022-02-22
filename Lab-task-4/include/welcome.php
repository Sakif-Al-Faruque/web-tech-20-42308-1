<h1>
<?php 
    session_start();
    if(isset($_SESSION["username"])){
        echo "Welcome ".$_SESSION["username"];
    }else{
        echo "Session is not set";
    }
?>
</h1>
<a href="logout.php">Log out</a>
