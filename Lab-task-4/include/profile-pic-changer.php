<?php require("user-content-start.php"); ?>
<?php
    $img_path = '../images/001-user.png';
    $imgErr = '';
    // Check if image file is a actual image or fake image
    if(isset($_POST["imgup"])) {
        $target_dir = "../images/uploads/";
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
    <section class="text-center" style="box-sizing: border-box; padding: 40px;">
        <img src="<?php echo $img_path; ?>" alt="Need a image" height='128px' width='128px'><br><br>
        <form class="form-control bg-secondary" action="profile-pic-changer.php" method='post' enctype="multipart/form-data">
            <div class="mb-3 row">
                <div class="col-lg-7"><input class="form-control" type="file" name='fname'></div>
                <div class="col-lg-1"><input class="btn btn-warning" type="submit" name='imgup' value='Submit'></div>
                <div class="col-lg-4"><span><?php echo $imgErr; ?></span></div>
            </div>
            
        </form>
    </section>
    
<?php require("user-content-finish.php"); ?>