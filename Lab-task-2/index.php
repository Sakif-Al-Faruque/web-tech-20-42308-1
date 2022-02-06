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
        $email = "";
        $dob = "";
        $gender = "";
        $degree = "";
        $bloodGroup = "";

        $nameErr = "";
        $emailErr = "";
        $dobErr = "";
        $genderErr = "";
        $degreeErr = "";
        $bloodGroupErr = "";

        $pattern = "/^[a-z]+([a-z]|[0-9]|\.|-)+/i";

        if(isset($_POST["sub"])){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["name"])){
                    $nameErr = "* name field is required";
                }else if(str_word_count($_POST["name"]) < 2){
                    $nameErr = "* name field at least contains 2 words";
                }else if(preg_match($pattern, $_POST["name"]) < 0){
                    $nameErr = "* string have to be started with character and may contain . and - only";
                }else{
                    $name = $_POST["name"];
                }

                if(empty($_POST["email"])){
                    $emailErr = "* email field is required";
                    //$email = "";
                }else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $emailErr = "* format error";
                    //$email = "";
                }else{
                    $email = $_POST["email"];
                }

                if(empty($_POST["date"])){
                    $dobErr = "* date field is required";
                    //$dob = "";
                }else{
                    $dob = $_POST["date"];
                    $d = explode("-", $dob);
                    $yy = (int)$d[0];
                    $mm = (int)$d[1];
                    $dd = (int)$d[2];

                    if(!($yy < 1998 && $yy > 1953 && $mm < 12 && $mm > 1 && $dd < 31 && $dd > 1)){
                        $dobErr = "* date is valid for only (1953 - 1998)";
                        $dob = "";
                    }
                }

                if(empty($_POST["gender"])){
                    $genderErr = "* gender must be checked";
                    //$gender = "";
                }else{
                    $gender = $_POST["gender"];
                }

                if(empty($_POST["deg"])){
                    $degreeErr = "* degree must be checked";
                    //$degree = "";
                }else{
                    $degree = $_POST["deg"];
                    if(count($degree)<2){
                        $degree = "";
                        $degreeErr = "* at least 2 degree must be checked";
                    }
                }

                if(empty($_POST["bg"])){
                    $bloodGroupErr = "* blood group must be selected";
                    //$bloodGroup = "";
                }else{
                    $bloodGroup = $_POST["bg"];
                }
            }
        }
        
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $name;?>"><span><?php echo $nameErr; ?></span><br>

        E-mail: <input type="text" name="email" value="<?php echo $email;?>"><span><?php echo $emailErr; ?></span><br>

        Date of Birth: <input type="date" name="date"><span><?php echo $dobErr; ?></span><br>

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

        Degree: <span><?php echo $degreeErr; ?></span> <br>
        <input type="checkbox" name="deg[]" value="ssc">SSC <br>
        <input type="checkbox" name="deg[]" value="hsc">HSC <br>
        <input type="checkbox" name="deg[]" value="bsc">BSc <br>
        <input type="checkbox" name="deg[]" value="msc">MSc <br>

        <select name="bg" id="">
            <option value="">Selection Blood Group</option>
            <option value="a-p">A+</option>
            <option value="a-n">A-</option>
            <option value="b-p">B+</option>
            <option value="b-n">B-</option>
            <option value="ab-p">AB+</option>
            <option value="ab-n">AB-</option>
            <option value="o-p">O+</option>
            <option value="o-n">O-</option>
        </select><span><?php echo $bloodGroupErr; ?></span><br>

        <input type="submit" value="Submit" name="sub">
    </form>

    <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $dob;
        echo "<br>";
        echo $gender;
        echo "<br>";
        if($degree != ""){
            if(count($degree)>0){
                echo "degree: ";
                foreach($degree as $val){
                    echo $val." ";
                }
            }
        }
        echo "<br>";
        echo $bloodGroup;
    ?>
</body>
</html>