<?php require("user-content-start.php"); ?>
<?php 

$email = '';
$dob = '';
$gender = '';

$data = json_decode(file_get_contents("../json/data.json"), true);
                
foreach($data as $user){
    if($user["username"] === $_SESSION['username']){
        $email = $user['email'];
        $dob = $user['dob'];
        $gender = $user['gender'];
        break;
    }
}

?>
    <section>
        <div class="container">
        <div class="card" style="50%;">
            <img src="../images/001-user.png" class="card-img-top" height='228px' alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_SESSION['name']; ?></h5>
                <p class="card-text">
                    <p><span class="badge bg-secondary">Username</span> <?php echo $_SESSION['username']; ?></p>
                    <p><span class="badge bg-secondary">E-mail</span> <?php echo $email; ?></p>
                    <p><span class="badge bg-secondary">Date-of-Birth</span> <?php echo $dob; ?></p>
                    <p><span class="badge bg-secondary">Gender</span> <?php echo $gender; ?></p>
                </p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>
        </div>
    </section>
<?php require("user-content-finish.php"); ?>