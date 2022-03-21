<h1>Add Product</h1>
<p>
<?php
    session_start();
    if(isset($_SESSION["pd_msg"])){
        echo $_SESSION["pd_msg"];
        $_SESSION["pd_msg"] = "";
    }
?>
</p>
<form action="../controls/add-product-control.php" method="post">
    <input type="text" name="sl" placeholder="Serial"><br>
    <input type="text" name="pd_name" placeholder="name"><br>
    <input type="text" name="pd_buying_price" placeholder="Buying Price"><br>
    <input type="text" name="pd_selling_price" placeholder="Selling Price"><br>
    <input type="submit" name="add" value="Add Product">
</form>
<a href="/web-tech-20-42308-1/Lab-task-5/index.php">Back</a>
