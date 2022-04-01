<div class="welcome-content" style="padding: 100px 0;">
    <div class="container text-center fs-5">
        <p>Welcome to registration page</p>
    </div>
</div>



    <div class="form-content py-5">
        <div class="container text-start" style="width: 80%;">
            <form action="../controls/registration-control.php" method="post" class="form-control">

                <div class="form-group row">
                    <label for="staticUname" class="col-sm-2 col-form-label">User name: </label>
                    <div class="col-sm-10">
                        <input type="text" id="staticUname" class="form-control-plaintext bg-light" name="uname" ><span class="text-danger"><br>
                    </div>
                </div>
                 

                <div class="form-group row">
                    <label for="staticPass" class="col-sm-2 col-form-label">Password: </label>
                    <div class="col-sm-10">
                        <input type="text" id="staticPass" class="form-control-plaintext bg-light" name="pass" ><span class="text-danger"><br>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticPass" class="col-sm-2 col-form-label">Confirm password: </label>
                    <div class="col-sm-10">
                        <input type="text" id="staticPass" class="form-control-plaintext bg-light" name="c-pass" ><br>
                    </div>
                </div>
                 
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

                <input class="btn btn-secondary" type="submit" value="Submit" name="sub">
                <input class="btn btn-warning" type="reset" value="Reset"><br>
                
            </form>
            <a href="/web-tech-20-42308-1/Lab-task-6/index.php">Back</a>
        </div>
    </div>