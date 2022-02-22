<?php require("header.php"); ?>

<div class="welcome-content" style="padding: 100px 0;">
    <div class="container text-center fs-5">
        <p>Welcome to registration page</p>
    </div>
</div>

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
                    $uname = $_POST["uname"];
                    /* $name = $_POST["name"];
                    $uname = $_POST["uname"];
                    $email = $_POST["email"];
                    $pass = $_POST["pass"];
                    $cPass = $_POST["c-pass"];
                    $dob = $_POST["date"];
                    $gender = $_POST["gender"]; */

                    $newUser = array("name"=>$name, "username"=>$uname, "password"=>$pass, "email"=>$email, "dob"=>$dob, "gender"=>$gender);

                    $data = json_decode(file_get_contents("../json/data.json"), true);

                    $data[] = $newUser;

                    file_put_contents("../json/data.json", json_encode($data));
                    $successMsg = "Data has been uploaded<br>";
                }
            }
        }
        
    ?>

    <div class="form-content py-5">
        <div class="container text-start" style="width: 80%;">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form-control">
                 

                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Name: </label>
                    <div class="col-sm-10">
                        <input type="text" id="staticName" class="form-control-plaintext bg-light" name="name"><span class="text-danger"><?php echo $nameErr; ?></span><br>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">E-mail: </label>
                    <div class="col-sm-10">
                        <input type="text" id="staticName" class="form-control-plaintext bg-light" name="email" ><span class="text-danger"><?php echo $emailErr; ?></span><br>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticUname" class="col-sm-2 col-form-label">User name: </label>
                    <div class="col-sm-10">
                        <input type="text" id="staticUname" class="form-control-plaintext bg-light" name="uname" ><span class="text-danger"><?php echo $unameErr; ?></span><br>
                    </div>
                </div>
                 

                <div class="form-group row">
                    <label for="staticPass" class="col-sm-2 col-form-label">Password: </label>
                    <div class="col-sm-10">
                        <input type="text" id="staticPass" class="form-control-plaintext bg-light" name="pass" ><span class="text-danger"><?php echo $passErr; ?></span><br>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticPass" class="col-sm-2 col-form-label">Confirm password: </label>
                    <div class="col-sm-10">
                        <input type="text" id="staticPass" class="form-control-plaintext bg-light" name="c-pass" ><span class="text-danger"><?php echo $cPassErr; ?></span><br>
                    </div>
                </div>
                 
                <div class="row">
                    <div class="col-lg-3">
                    Gender:
                    </div>
                    <div class="col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male">
                            <label class="form-check-label" for="exampleRadios1">Male</label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                            <label class="form-check-label" for="exampleRadios2">Female</label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="other">
                            <label class="form-check-label" for="exampleRadios3">Other</label>
                        </div>
                    </div>
                </div>                

                <div class="form-group row">
                    <label for="staticPass" class="col-sm-2 col-form-label">Date of Birth: </label>
                    <div class="col-sm-10">
                        <input type="date" id="staticPass" class="form-control-plaintext bg-light" name="date" ><span class="text-danger"><?php echo $dobErr; ?></span><br>
                    </div>
                </div>

                <input class="btn btn-secondary" type="submit" value="Submit" name="sub">
                <input class="btn btn-warning" type="reset" value="Reset"><br>
                <span class="text-success"><?php echo $successMsg; ?></span>
            </form>
        </div>
    </div>
    

<?php require("footer.php"); ?>