<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Home</title>
</head>
<body>
    <main>
            <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark">
                <div class="container-fluid container">
                    <a class="navbar-brand" href="/web-tech-20-42308-1/Lab-task-4/">
                        <img src="/web-tech-20-42308-1/Lab-task-4/images/tutor.png" alt="tutor image" height="70px" width="70px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                            <?php if(isset($_SESSION['username'])){ ?>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/web-tech-20-42308-1/Lab-task-4/include/dashboard.php">Logged in as <?php echo $_SESSION['name'];?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" aria-current="page" href="/web-tech-20-42308-1/Lab-task-4/include/logout.php">| Logout</a>
                                </li>

                            <?php }else{ ?>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/web-tech-20-42308-1/Lab-task-4/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/web-tech-20-42308-1/Lab-task-4/include/login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/web-tech-20-42308-1/Lab-task-4/include/registration.php">Registration</a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </nav>
    </main>