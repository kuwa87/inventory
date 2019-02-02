 <?php
    include_once 'User.php';
    // $user_id = $_SESSION['user_id'];
    $users = new User;
    $users->logged_in();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="blog.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Permanent+Marker" rel="stylesheet">
</head>
<body class="login">
    <div class="container-fluid p-0">
            <?php
    include 'loginmenu.php';
        ?>
        <!-- <div class="jumbotron bg-primary rounded-0 mb-0">
            <h1><i class="fas fa-user"></i>Admin</h1>
        </div> -->
        <div class="bg-light top-area"></div>
        <div class="common-wrap">
        <div class="login-area">
                <h2 class="bg-light">Login</h2>
                <div class="form-group">
                <form action="" method="post">
                Username<br>
                <input type="text" name="username" class="form-control" required>
                Password<br>
                <input type="text" name="password" class="form-control" required>
                <input type="submit" name="login" class="btn btn-primary btn-block" value="Login">
                </form>
                <?php
                if(isset($_POST['login'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    // $users = new User;
                    $result = $users->login($username,$password);
                }
                    ?>
                <br>
                <a href="register.php">Not yet Registered?</a>
                </div>
        </div>
        </div>
    </div>
</body>
</html>