<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
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

                $data = json_decode(file_get_contents("data.json"), true);
                
                foreach($data as $user){
                    if($user["username"] === $_POST['uname'] and $user["password"] === $_POST['pass']){
                        echo "Welcome ";
                        echo $user["username"]."<br>";
                        //echo $user["password"]."<br>";
                        $flag = false;
                        break;
                    }
                }
                if($flag){
                    echo "Invalid credential";
                }
            }
        }
    ?>
    <form action="login.php" method="POST">
        Username: <input type="text" name="uname"><span><?php echo $userNameErr; ?></span><br>
        Password: <input type="password" name="pass"><span><?php echo $userPassErr; ?></span><br>
        <input type="submit" value="Login" name="log"><a href="pass_changer.php?id=<?php echo $uname; ?>">Forget password</a>
    </form>
</body>
</html>