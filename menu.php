 <?php
    include_once 'User.php';
    // $user_id = $_SESSION['user_id'];
    $user = new User;
    $user->login_required();
 ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="dashboard.php" class="navbar-brand text-white"><i class="fas fa-smile"></i>Inventory</a>
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
                                <a href="items.php" class="nav-link">Items</a>
                            </li>
                            <li class="nav-item">
                                <a href="categories.php" class="nav-link">Categories</a>
                            </li>
                                                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category Select</a>
                                    <div class="dropdown-menu" area-labelledby="navbarDropdown">
                                        <?php
                                        include_once 'Category.php';
                                        $category = new Category;
                                        $result = $category->get_category();
                                        foreach($result as $row){
                                            $category_id = $row['category_id'];
                                            $category_name = $row['category_name'];
                                            echo "<a class='dropdown-item' href='selectedcategory.php?category_id=$category_id'>".$row['category_name']."</a>";
                                        }
                                        ?>

                                        <!-- <a href="profile.php" class="dropdown-item"><i class="fas fa-user-circle"></i>Profile</a>
                                        <a href="settings.php" class="dropdown-item"><i class="fas fa-cog"></i>Settings</a> -->
                                    </div>
                                </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>Welcome
                                <?php
                                // session_start();
                                $user_id = $_SESSION['user_id'];
                                // $user = new User;
                                $row = $user->echo_users($user_id);
                                echo $row['username'];
                        
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
