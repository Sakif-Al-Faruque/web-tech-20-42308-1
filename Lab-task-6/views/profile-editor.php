<?php session_start();
    if(!isset($_SESSION["username"])){
        header("location: login.php");
    }

    //require("../models/data-model.php");
?>
<section style="padding: 40px;">
        <div class="form-content py-5">
            <div class="container text-start" style="width: 80%;">
                <form action="../controls/profile-editor-control.php" method="post" class="form-control">
                    <div class="row">
                        <div class="col-lg-3">
                        Gender:
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male">
                                <label class="form-check-label" for="exampleRadios1">Male</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                                <label class="form-check-label" for="exampleRadios2">Female</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="other">
                                <label class="form-check-label" for="exampleRadios3">Other</label>
                            </div>
                        </div>
                    </div>                
                    <input class="btn btn-secondary" type="submit" value="Update" name="sub">
                    <input class="btn btn-warning" type="reset" value="Reset"><br>
                </form>
                <a href="/web-tech-20-42308-1/Lab-task-6/views/dashboard.php">Back</a>
            </div>
        </div>
    </section>