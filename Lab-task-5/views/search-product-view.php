<?php 
session_start();
require("../controls/list-product-control.php");
?>
<h1>Search Product</h1><br>
<table border="1">
<thead>
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Buying Price</th>
        <th>Selling Price</th>
        <th colspan="2">Action</th>
    </tr>
</thead>
<tbody>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="text" name="nm" placeholder="Search by product name">
        <input type="submit" value="Search Product" name="search">
    </form>
    
    <?php 
    $name = "";
    if(isset($_POST["search"])){
        $name = $_POST["nm"];
    }
    $rows = get_data_by_name($name);
    foreach($rows as $i => $row){ 
    ?>
    <tr>
        <td><?php echo $row["SL"]; ?></td>
        <td><?php echo $row["Name"]; ?></td>
        <td><?php echo $row["buying_price"]; ?></td>
        <td><?php echo $row["selling_price"]; ?></td>
        <td><a href="/web-tech-20-42308-1/Lab-task-5/views/delete-product-view.php?id=<?php echo $row["SL"]; ?>">Delete</a></td>
        <td><a href="/web-tech-20-42308-1/Lab-task-5/views/update-product-view.php?id=<?php echo $row["SL"]; ?>">Update</a></td>
    </tr>
    <?php } ?>
</tbody>
</table>
<p><?php 
    if(isset($_SESSION["pd_msg"])){
        echo $_SESSION["pd_msg"];
        $_SESSION["pd_msg"] = "";
    }
?></p>
<a href="/web-tech-20-42308-1/Lab-task-5/index.php">Back</a>