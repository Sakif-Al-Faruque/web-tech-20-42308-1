<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        span{
            color: red;
        }
    </style>
    <title>form</title>
</head>
<body>
    <?php 
        $name = "";
        $uname = "";
        $email = "";
        $pass = "";
        $cPass = "";
        $dob = "";
        $gender = "";

        $nameErr = "";
        $unameErr = "";
        $emailErr = "";
        $passErr = "";
        $cPassErr = "";
        $dobErr = "";
        $genderErr = "";

        $successMsg = "";

        $pattern = "/^[a-z]+([a-z]|[0-9]|\.|-)+/i";

        if(isset($_POST["sub"])){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $err = false;

                //name
                if(empty($_POST["name"])){
                    $nameErr = "* name field is required";
                    $err = true;
                }else if(str_word_count($_POST["name"]) < 2){
                    $nameErr = "* name field at least contains 2 words";
                    $err = true;
                }else if(preg_match($pattern, $_POST["name"]) < 0){
                    $nameErr = "* string have to be started with character and may contain . and - only";
                    $err = true;
                }else{
                    $name = $_POST["name"];
                }

                //email
                if(empty($_POST["email"])){
                    $emailErr = "* email field is required";
                    $err = true;
                    //$email = "";
                }else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $emailErr = "* format error";
                    //$email = "";
                    $err = true;
                }else{
                    $email = $_POST["email"];
                }

                //date
                if(empty($_POST["date"])){
                    $dobErr = "* date field is required";
                    //$dob = "";
                    $err = true;
                }else{
                    $dob = $_POST["date"];
                    $d = explode("-", $dob);
                    $yy = (int)$d[0];
                    $mm = (int)$d[1];
                    $dd = (int)$d[2];

                    if(!($yy < 1998 && $yy > 1953 && $mm < 12 && $mm > 1 && $dd < 31 && $dd > 1)){
                        $dobErr = "* date is valid for only (1953 - 1998)";
                        $dob = "";
                        $err = true;
                    }
                }

                //gender
                if(empty($_POST["gender"])){
                    $genderErr = "* gender must be checked";
                    //$gender = "";
                    $err = true;
                }else{
                    $gender = $_POST["gender"];
                }

                //password
                if(empty($_POST["pass"])){
                    $passErr = "* password is required";
                    $err = true;
                }else if($_POST["pass"] != $_POST["c-pass"]){
                    $cPassErr = "* password is not matched";
                    $err = true;
                }else{
                    $pass = $_POST["pass"];
                }

                //data upload
                if(!$err){
                    /* $name = $_POST["name"];
                    $uname = $_POST["uname"];
                    $email = $_POST["email"];
                    $pass = $_POST["pass"];
                    $cPass = $_POST["c-pass"];
                    $dob = $_POST["date"];
                    $gender = $_POST["gender"]; */

                    $newUser = array("name"=>$name, "username"=>$uname, "password"=>$pass, "email"=>$email, "dob"=>$dob, "gender"=>$gender);

                    $data = json_decode(file_get_contents("data.json"), true);

                    $data[] = $newUser;

                    file_put_contents("data.json", json_encode($data));
                    $successMsg = "Data has been uploaded<br>";
                }
            }
        }
        
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Name: <input type="text" name="name"><span><?php echo $nameErr; ?></span><br>

        E-mail: <input type="text" name="email" ><span><?php echo $emailErr; ?></span><br>

        User name: <input type="text" name="uname" ><span><?php echo $unameErr; ?></span><br>

        Password: <input type="text" name="pass" ><span><?php echo $passErr; ?></span><br>

        Confirm password: <input type="text" name="c-pass" ><span><?php echo $cPassErr; ?></span><br>

        Gender:
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="female") echo "checked";?>
        value="female">Female
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="male") echo "checked";?>
        value="male">Male
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="other") echo "checked";?>
        value="other">Other <span><?php echo $genderErr; ?></span><br>

        Date of Birth: <input type="date" name="date"><span><?php echo $dobErr; ?></span><br>

        <input type="submit" value="Submit" name="sub">
        <input type="reset" value="Reset"><br>
        <span><?php echo $successMsg; ?></span>
    </form>
</body>
</html>