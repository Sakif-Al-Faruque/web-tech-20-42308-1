<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>picture uploader</title>
</head>
<body>
<?php
    $img_path = '';
    $imgErr = '';
    // Check if image file is a actual image or fake image
    if(isset($_POST["imgup"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fname"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        /* $check = getimagesize($_FILES["fname"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        } */

        // Check if file already exists
        /* if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        } */

        // Check file size
        if ($_FILES["fname"]["size"] > 400000) {
            $imgErr = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") { 
            $imgErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo 
            $imgErr = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fname"]["tmp_name"], $target_file)) {
                $img_path = $target_dir.basename( $_FILES["fname"]["name"]);
            } else {
                $imgErr = "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>
    <img src="<?php echo $img_path; ?>" alt="Need a image" height='150px' width='100px'>
    <form action="picture-upload.php" method='post' enctype="multipart/form-data">
        <input type="file" name='fname'><br>
        <input type="submit" name='imgup' value='Submit'>
        <span><?php echo $imgErr; ?></span>
    </form>
</body>
</html>