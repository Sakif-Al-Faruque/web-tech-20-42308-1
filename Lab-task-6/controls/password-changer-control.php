<?php
        require("../models/data-model.php");
        session_start();
        $uname = $_SESSION['username'];

        if(isset($_POST["chng-pass"])){
            if($_POST["c-pass"] === $_POST["n-pass"]){
                $_SESSION["auth-error"] = 'New Password should not be same as the Current Password';
            }else if($_POST["r-pass"] != $_POST["n-pass"]){
                $_SESSION["auth-error"] = 'New Password must match with the Retyped Password';
            }else{
                $data = showUserByUname($_SESSION["username"]);

               //echo $gender;
                
               if($data != null){
                    $mdata = array("password"=> $_POST["n-pass"], "gender"=>$data["gender"]);
                    updateUser($_SESSION["username"], $mdata);
                    header("location: ../views/password-changer.php");
               }
            }
        }
        
?>