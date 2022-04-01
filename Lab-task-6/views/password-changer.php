<?php session_start();
    if(!isset($_SESSION["username"])){
        header("location: login.php");
    }
?>

    <section style="box-sizing: border-box; padding: 40px;"class="text-center">
        <p class="fs-3">Change Password - <?php echo $_SESSION["username"]; ?></p>
        <form action="../controls/password-changer-control.php" method="POST">
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

            <input type="submit" value="change password" name="chng-pass" class="btn btn-warning"><br>
            <span><?php 
                if(isset($_SESSION["auth-error"])){
                    echo $_SESSION["auth-error"];
                    $_SESSION["auth-error"] = "";
                }
            ?></span>
        </form> 
        <a href="/web-tech-20-42308-1/Lab-task-6/views/dashboard.php">Back</a><br>
    </section>   
