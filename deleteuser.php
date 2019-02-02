<?php

    include 'User.php';
    $user_id = $_GET['user_id'];
    $users = new User;
    $row = $users->get_users($user_id);
    $delete = $users->delete($user_id);


?>