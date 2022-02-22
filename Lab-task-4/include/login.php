<?php require("header.php"); ?>
<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: dashboard.php");
    }
?>

<?php 
        $uname = "";
        $pass = "";
        $userNameErr = '';
        $userPassErr = '';
        if(isset($_POST['log'])){
            if(strlen($_POST['uname']) < 2){
                $userNameErr = 'User Name must contain at least two (2) characters';
            }else if(!preg_match("/^[a-zA-Z]([a-zA-Z]|[0-9]|.|_|-)+/", $_POST['uname'])){
                $userNameErr = 'User Name can contain alpha numeric characters, period, dash or 
                underscore only';
            }else if(strlen($_POST['pass']) < 8){
                $userPassErr = 'Password must not be less than eight (8) characters';
            }else if(!((str_contains($_POST['pass'], '@') === true) || (str_contains($_POST['pass'], '#') === true) || (str_contains($_POST['pass'], '%') === true) || (str_contains($_POST['pass'], '$') === true))){
                $userPassErr = 'Password must contain at least one of the special characters (@, #, $,
                %)';
            }else{
                $uname = $_POST['uname'];
                $flag = true;

                $data = json_decode(file_get_contents("../json/data.json"), true);
                
                foreach($data as $user){
                    if($user["username"] === $_POST['uname'] and $user["password"] === $_POST['pass']){
                        /* echo "Welcome ";
                        echo $user["username"]."<br>";
                        //echo $user["password"]."<br>"; */

                        //set session
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["name"] = $user["name"];

                        //set cookie
                        if(isset($_POST["r-me"]) && $_POST["r-me"] === "t"){
                            setcookie("username", $user["username"], time() + 20, "/");
                        }
                        
                        $flag = false;

                        header("Location: dashboard.php");
                        break;
                    }
                }
                if($flag){
                    echo "Invalid credential";
                }
            }
        }
    ?>
<div class="welcome-content" style="padding: 100px 0;">
    <div class="container text-center fs-5">
        <p>Welcome to login page</p>
    </div>
</div>

<div class="form-content py-5">
    <div class="container text-start" style="width: 40%;">
        <form action="login.php" method="POST" class="form-control">

            <div class="form-group row">
                <label for="staticUsername" class="col-sm-2 col-form-label">Username: </label>
                <div class="col-sm-10">
                    <input type="text" id="staticUsername" class="form-control-plaintext" name="uname"><span><?php echo $userNameErr; ?></span><br>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="staticPassword" class="col-sm-2 col-form-label">Password: </label>
                <div class="col-sm-10">
                <input type="password" id="staticPassword" class="form-control-plaintext" name="pass"><span><?php echo $userPassErr; ?></span><br>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="r-me" value="t" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">Remember me</label>
            </div>

            <!-- <input type="checkbox" name="r-me" value="t">  <br> -->
            <hr>
            <input type="submit" class="btn btn-primary" value="Login" name="log">
            <a class="btn btn-link" href="pass_changer.php?id=<?php echo $uname; ?>">Forget password</a>
        </form>
    </div>
</div>
    

<?php require("footer.php"); ?>