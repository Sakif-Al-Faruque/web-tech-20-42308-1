<?php 
    require("../controls/product-details.php");
    if(isset($_GET["id"])){
        $row = get_a_product($_GET["id"]);
    }else{
        header("location: list-product-view.php");
    }

?>
<h1>Update Product</h1>
<form action="../controls/update-product-control.php" method="post">
    <input type="text" name="pd_name" value="<?php echo $row["Name"]; ?>"><br>
    <input type="text" name="pd_buying_price" value="<?php echo $row["buying_price"]; ?>"><br>
    <input type="text" name="pd_selling_price" value="<?php echo $row["selling_price"]; ?>"><br>
    <input type="hidden" name="sl" value="<?php echo $_GET["id"]; ?>">
    <input type="submit" name="change" value="Change Product Details">
</form>
<a href="/web-tech-20-42308-1/Lab-task-5/index.php">Back</a>
