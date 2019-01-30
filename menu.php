<?php
    session_start();
    ob_start();
    include 'connection.php';
?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="dashboard.php" class="navbar-brand text-white"><i class="fas fa-smile"></i>BLOG</a>
            <!-- button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <!-- menu -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="dashboard.php" class="nav-link">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="posts.php" class="nav-link">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a href="categories.php" class="nav-link">Categories</a>
                            </li>
                            <li class="nav-item">
                                    <a href="users.php" class="nav-link">Users</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>Welcome
                                <?php
                                $loginid = $_SESSION['loginid'];
                                $sql = "SELECT * FROM user WHERE loginID = '$loginid'";
                                $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $name = $row['name'];
                                        echo $name;
                                    } else{
                                        echo 'error' .$conn->error;
                                    }

                        
                                ?>
                                
                                </a>
                                    <div class="dropdown-menu" area-labelledby="navbarDropdown">
                                        <a href="profile.php" class="dropdown-item"><i class="fas fa-user-circle"></i>Profile</a>
                                        <a href="settings.php" class="dropdown-item"><i class="fas fa-cog"></i>Settings</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                        <a href="logout.php" class="nav-link"><i class="fas fa-user-times"></i>Logout</a>
                                </li>
                            </ul>
                                </div>
        </nav>
