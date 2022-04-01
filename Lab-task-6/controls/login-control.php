<?php 
        require("../models/data-model.php");
        session_start();

        
        $_SESSION["username"] = "";
        $_SESSION["auth-msg"] = "";

        if(isset($_POST['log'])){
            $uname = $_POST['uname'];
            $pass =  $_POST['pass'];
            
            $data = showUser($uname, $pass);

            if($data != NULL){
                $_SESSION["username"] = $data["username"];
                header("location: ../views/dashboard.php");
            }

        }
    ?>