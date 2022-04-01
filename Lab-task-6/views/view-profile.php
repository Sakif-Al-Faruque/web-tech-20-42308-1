<?php session_start();
    if(!isset($_SESSION["username"])){
        header("location: login.php");
    }

    require("../models/data-model.php");
?>

<table border="1">
<thead>
    <tr>
    <th>Username</th>
    <th>Gender</th>
    </tr>
    
</thead>

<tbody>
    <?php $data = showUserByUname($_SESSION["username"]);
        if($data != null){
    ?>
    <tr>
    <td><?php echo $data["username"]; ?></td>
    <td><?php echo $data["gender"]; ?></td>
    </tr>
    <?php } ?>
</tbody>

</table>

<a href="/web-tech-20-42308-1/Lab-task-6/views/dashboard.php">Back</a><br>