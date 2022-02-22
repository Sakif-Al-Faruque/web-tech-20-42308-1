<?php require("user-content-start.php"); ?>
<?php
        $user_count = 0;
        $passErr = '';
        $uname = $_SESSION['username'];

        if(isset($_POST["chng-pass"])){
            if($_POST["c-pass"] === $_POST["n-pass"]){
                $passErr = 'New Password should not be same as the Current Password';
            }else if($_POST["r-pass"] != $_POST["n-pass"]){
                $passErr = 'New Password must match with the Retyped Password';
            }else{
                //echo 'validation completed';
                $data = json_decode(file_get_contents("../json/data.json"), true);
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
                /* var_dump($tmp_user);
                echo $user_count; */
                $data[$user_count-1] = $tmp_user;
                file_put_contents("../json/data.json", json_encode($data));
            }
        }
        
    ?>
    <section style="box-sizing: border-box; padding: 40px;"class="text-center">
        <p class="fs-3">Change Password - <?php echo $uname; ?></p>
        <form action="password-changer.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Current password</span>
                <input type="text" class="form-control" name="c-pass" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">New password</span>
                <input type="text" class="form-control" name="n-pass" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Re-type password</span>
                <input type="text" class="form-control" name="r-pass" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
            </div>

            <input type="submit" value="Submit" name="chng-pass" class="btn btn-warning"><br>
            <span><?php echo $passErr; ?></span>
        </form> 
    </section>   
<?php require("user-content-finish.php"); ?>