<?php session_start(); ?>
<?php if(isset($_SESSION["username"])){?>

    <p style="color: red; text-align: center;">Welcome <?php echo $_SESSION["username"]; ?></p>
    <a href="view-profile.php">View Profile</a><br>
    <a href="profile-editor.php">Edit Profile</a><br>
    <a href="password-changer.php">Change Password</a><br>
    <a href="/web-tech-20-42308-1/Lab-task-6/controls/logout.php">Log out</a><br>
    

<?php }else{

    header("location: login.php");
}?>
    
