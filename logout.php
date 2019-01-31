 <?php
    include 'User.php';
    $users = new User;
    $result = $users->logout($username,$password);

 ?>