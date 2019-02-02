<?php
    include "User.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> 
</head>

<body>
    <div class="container-fluid">
        <div class="jumbotron p-3 text-white bg-dark rounded-0">Users</div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>username</th>
                    <th>name</th>
                    <th>email</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $users = new User;
                    $result = $users->get_users();

                    // print_r($result);
                    // var_dump($result);

                    if ($result) {
                        foreach ($result as $row) {
                            $user_id = $row['user_id'];

                            echo "<tr>";
                            echo "<td>".$row['user_id']."</td>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['firstname']." ".$row['lastname']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td><form></form>
                            <a href='edituser.php?user_id=$user_id&action=1' class='btn btn-sm btn-success'>Edit</a> <a href='deleteuser.php?user_id=$user_id&action=3' class='btn btn-sm btn-danger text-white'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }

                ?>
            </tbody>
        </table>
        <a href="createuser.php" class="btn btn-primary">Add User</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>