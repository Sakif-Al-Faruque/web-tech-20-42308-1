<?php require("user-content-start.php"); ?>
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

        $user_count = 0;

        $pattern = "/^[a-z]+([a-z]|[0-9]|\.|-)+/i";

        //data found
        $data = json_decode(file_get_contents("../json/data.json"), true);
                                
        foreach($data as $user){
            if($user["username"] === $_SESSION['username']){
                global $tmp_user;
                $tmp_user = $user;

                $name = $user["name"];
                $email = $user['email'];
                $dob = $user['dob'];
                $gender = $user['gender'];

                $user_count++;
                break;
            }
            $user_count++;
        }

        if(isset($_POST["sub"])){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $err = false;

                //name
                /* echo 'hello'; */
                

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
                /* if(empty($_POST["date"])){
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
                } */

                //gender
                if(empty($_POST["gender"])){
                    $genderErr = "* gender must be checked";
                    //$gender = "";
                    $err = true;
                }else{
                    $gender = $_POST["gender"];
                }

                //password
                /* if(empty($_POST["pass"])){
                    $passErr = "* password is required";
                    $err = true;
                }else if($_POST["pass"] != $_POST["c-pass"]){
                    $cPassErr = "* password is not matched";
                    $err = true;
                }else{
                    $pass = $_POST["pass"];
                } */

                //data upload
                
                if(!$err){
                    //echo 'hell';
                    
                    /* foreach($data as $user){
                        if($user["username"] === $uname){
                            $user["name"] = $_POST['name'];
                            $user["email"] = $_POST['email'];
                            $user["gender"] = $_POST['gender'];
                            $user["dob"] = $_POST['date'];

                            
                            $tmp_user = $user;
                            //echo $user["password"]."<br>";
                            //echo $_POST['n-pass']."<br>";
                            $successMsg = "Profile modified";
                            $user_count++;
                            break;
                        }
                        
                    } */
                    /* var_dump($tmp_user);
                    echo $user_count; */

                    $tmp_user["name"] = $_POST['name'];
                    $tmp_user["email"] = $_POST['email'];
                    $tmp_user["gender"] = $_POST['gender'];
                    $tmp_user["dob"] = $_POST['date'];

                    $data[$user_count-1] = $tmp_user;
                    file_put_contents("../json/data.json", json_encode($data));
                }
            }
        }
        
    ?>
    <section style="padding: 40px;">
        <div class="form-content py-5">
            <div class="container text-start" style="width: 80%;">
                <form action="profile-editor.php" method="post" class="form-control">

                    <div class="form-group row">
                        <label for="staticName" class="col-sm-2 col-form-label">Name: </label>
                        <div class="col-sm-10">
                            <input type="text" id="staticName" value="<?php echo $name; ?>" class="form-control-plaintext bg-light" name="name"><span class="text-danger"><?php echo $nameErr; ?></span><br>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticName" class="col-sm-2 col-form-label">E-mail: </label>
                        <div class="col-sm-10">
                            <input type="text" id="staticName" value="<?php echo $email; ?>" class="form-control-plaintext bg-light" name="email" ><span class="text-danger"><?php echo $emailErr; ?></span><br>
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
    </section>
    
<?php require("user-content-finish.php"); ?>