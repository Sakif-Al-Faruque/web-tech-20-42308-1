<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password changer</title>
</head>
<body>
    <?php 
        $uname = $_GET['id'];
        $user_count = 0;
        $passErr = '';

        if(isset($_POST["chng-pass"])){
            if($_POST["c-pass"] === $_POST["n-pass"]){
                $passErr = 'New Password should not be same as the Current Password';
            }else if($_POST["r-pass"] != $_POST["n-pass"]){
                $passErr = 'New Password must match with the Retyped Password';
            }else{
                //echo 'validation completed';
                $data = json_decode(file_get_contents("data.json"), true);
                foreach($data as $user){
                    if($user["username"] === $uname){
                        $user["password"] = $_POST['n-pass'];
                        global $tmp_user;
                        $tmp_user = $user;
                        //echo $user["password"]."<br>";
                        //echo $_POST['n-pass']."<br>";
                        $user_count++;
                        break;
                    }
                    $user_count++;
                }
                $data[$user_count] = $tmp_user;
                file_put_contents("data.json", json_encode($data));
            }
        }
        
    ?>
    <form action="pass_changer.php?id=<?php echo $uname; ?>" method="POST">
        Welcome <?php echo $uname; ?><br>
        Current password: <input type="text" name="c-pass"><br>
        New password: <input type="text" name="n-pass"><br>
        Re-type password: <input type="text" name="r-pass"><br>
        <input type="submit" value="Submit" name="chng-pass"><br>
        <span><?php echo $passErr; ?></span>
    </form>    
</body>
</html>