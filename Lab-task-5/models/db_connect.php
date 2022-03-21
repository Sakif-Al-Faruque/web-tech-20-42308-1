<?php 
function dbConnect(){
    $username = "root";
    $password = "";
    $dbname = "product_record";
    $server = "localhost";

    try {
        $conn = new PDO('mysql:host='.$server.';dbname='.$dbname.';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // var_dump($conn) ;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $conn;
}
//var_dump(dbConnect());





?>