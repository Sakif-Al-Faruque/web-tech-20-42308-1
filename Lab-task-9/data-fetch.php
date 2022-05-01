<?php 
    if(isset($_POST["id"])){
        $data = json_decode(file_get_contents("my-data.json"), true);
        foreach($data as $d){
            if($d["ID"] === $_POST["id"]){
                echo "Available";
            }
        }
    }
?>