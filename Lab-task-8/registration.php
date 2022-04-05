<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <form>
          <h2>Registration</h2>
          <div class="form-group">
            <label for="name-id">Name</label>
            <input type="text" class="form-control" id="name-id" aria-describedby="emailHelp">
            <small id="name-id-err" class="form-text text-danger"></small>
            <i class="fa-solid fa-circle-exclamation text-danger d-none"></i>
            <i class="fa-solid fa-circle-check text-success d-none"></i>
          </div>
          <div class="form-group">
            <label for="uname-id">Username</label>
            <input type="text" class="form-control" id="uname-id" aria-describedby="emailHelp">
            <small id="uname-id-err" class="form-text text-danger"></small>
            <i class="fa-solid fa-circle-exclamation text-danger d-none"></i>
            <i class="fa-solid fa-circle-check text-success d-none"></i>
          </div>
          <div class="form-group">
            <label for="pass-id">Password</label>
            <input type="password" class="form-control" id="pass-id">
            <small id="pass-id-err" class="form-text text-danger"></small>
            <i class="fa-solid fa-circle-exclamation text-danger d-none"></i>
            <i class="fa-solid fa-circle-check text-success d-none"></i>
          </div>
          <div class="form-group">
            <label for="re-pass-id">Confirm Password</label>
            <input type="password" class="form-control" id="re-pass-id">
            <small id="re-pass-id-err" class="form-text text-danger"></small>
            <i class="fa-solid fa-circle-exclamation text-danger d-none"></i>
            <i class="fa-solid fa-circle-check text-success d-none"></i>
          </div>

          <label>Gender</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender-id-1" value="male">
            <label class="form-check-label" for="gender-id-1">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender-id-2" value="female">
            <label class="form-check-label" for="gender-id-2">
              Female
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender-id-3" value="other">
            <label class="form-check-label" for="gender-id-3">
              Other
            </label>
          </div>
          <small id="gender-id-err" class="form-text text-muted"></small>
          <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> -->
          <button type="submit" class="btn btn-primary" id="submit">Register</button>
        </form>
      </div>
    </div>

    
  </div>
  
  <script src="js/jquery-1.12.4.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
