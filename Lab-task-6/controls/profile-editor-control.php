<?php 
session_start();
        require("../models/data-model.php");
        
        if(isset($_POST["sub"])){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
               $gender = $_POST["gender"];
               $data = showUserByUname($_SESSION["username"]);

               //echo $gender;
                
               if($data != null){
                    $mdata = array("password"=> $data["password"], "gender"=>$gender);
                    updateUser($_SESSION["username"], $mdata);
                    header("location: ../views/profile-editor.php");
               }
            }
        }
        
    ?>