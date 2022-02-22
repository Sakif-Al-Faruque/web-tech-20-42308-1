<?php 
    session_start(); 
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }   
?>
<?php require("header.php"); ?>
<div class="container" style="padding: 100px 0">
    <div class="row">
    <div class="col-lg-4 text-center">
        <p>Account</p>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/web-tech-20-42308-1/Lab-task-4/include/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/web-tech-20-42308-1/Lab-task-4/include/profile-viewer.php">View Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/web-tech-20-42308-1/Lab-task-4/include/profile-editor.php">Edit Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/web-tech-20-42308-1/Lab-task-4/include/profile-pic-changer.php">Change Profile Picture</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/web-tech-20-42308-1/Lab-task-4/include/password-changer.php">Change Password</a>
            </li>
        </ul>
    </div>
    <div class="col-lg-8 bg-secondary">


