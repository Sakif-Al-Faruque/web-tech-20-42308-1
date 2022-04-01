<?php require("db_connect.php"); ?>

<?php 

function addUser($data){
	$conn = dbConnect();
    $selectQuery = "INSERT INTO `user` VALUES (:username, :password, :gender);";
    
    //$selectQuery = "INSERT into product (Name, Surname, Username, Password, image) VALUES (:name, :surname, :username, :password, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':username' => $data['username'],
        	':password' => $data['password'],
        	':gender' => $data['gender']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



function showUser($id, $pass){
	$conn = dbConnect();
    $selectQuery = "SELECT `username`, `password`, `gender` FROM `user` WHERE `username` = ? and `password` = ?;";
    
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id, $pass]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function showUserByUname($id){
	$conn = dbConnect();
    $selectQuery = "SELECT `username`, `password`, `gender` FROM `user` WHERE `username` = ?;";
    
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function updateUser($id, $data){
	$conn = dbConnect();
    $selectQuery = "UPDATE `user` SET `password`=:password,`gender`=:gender WHERE `username`= :username;";
    
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':username' => $id,
        	':password' => $data['password'],
        	':gender' => $data['gender']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

//$data = array("username" => "john.123", "password"=> 1234, "gender"=>"male");
//addUser($data);
//var_dump(showUser("Hehe.123", "12345678"));
//echo showUser("Hehe.123", "12345678");
//var_dump(showUserByUname("Hehe.123"));
/* $data = array("password"=> 12345, "gender"=>"female");
updateUser("john.123", $data); */
// var_dump(showUserByUname("john.123"));
//var_dump(showUser("john.123", "555"));

?>