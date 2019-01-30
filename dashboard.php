<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Permanent+Marker" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="blog.css">
</head>

<body class="dashboard">
    <div class="container-fluid p-0">
            <?php
    include 'menu.php';
        ?>
        <div class="jumbotron bg-primary rounded-0 mb-0">
            <h1><i class="fas fa-pen"></i>Dashboard</h1>
        </div>
        <div class="bg-light top-area row">
            <div class="col-3">
                <a href="addpost.php" class="btn btn-blue">
                    <i class="fas fa-plus"></i>Add Post</a>
            </div>
            <div class="col-3">
                <a href="addcategory.php" class="btn btn-green">
                    <i class="fas fa-plus"></i>Add Category</a>
            </div>
            <div class="col-3">
                <a href="adduser.php" class="btn btn-orange">
                    <i class="fas fa-plus"></i>Add User</a>
            </div>
        </div>

        <div class="common-wrap">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="bg-light">Latest Posts</h2>
                    <?php
// $sql = "SELECT * FROM users";
$sql = "SELECT posts.postTitle, posts.postDate, categories.catName, posts.postID FROM categories INNER JOIN posts ON categories.catID = posts.catID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-stripe">
                <thead>
                        <tr class="bg-dark text-white">
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date posted</th>
                                <th></th>
                            </tr>
                </thead>
                <tbody>';
    $sequence = 1;
    while ($row = $result->fetch_assoc()) {
        $postID = $row['postID'];
        echo '<tr>';
        echo '<td>'.$sequence.'</td>';
        echo '<td>'.$row['postTitle'].'</td>';
        echo '<td>'.$row['catName'].'</td>';
        echo '<td>'.$row['postDate'].'</td>';
        echo "<td><a class='btn btn-white' href='postone.php?postID=$postID'><i class='fas fa-angle-double-right'></i>Details</a></td>";
        echo '</td>';
        echo '</tr>';
         $sequence ++;
    }
    echo ' </tbody></table>';
}
?>
                </div>
                <div class="col-md-3">
                    <div class="boxes blue-box">
                        <div class="box-title">Posts</div>
                        <div class="numbers"><i class="fas fa-pen"></i>
                        <?php
                        
                        $postSql = "SELECT * FROM posts";
                        $result = $conn->query($postSql);

                        $postCount = $result->num_rows;
                        echo $postCount;

                        // echo $result->num_rows;
                        ?>
                    
                    </div>
                        <a href="posts.php" class="btn">View</a>
                    </div>
                    <div class="boxes green-box">
                        <div class="box-title">Categories</div>
                        <div class="numbers"><i class="far fa-folder-open"></i>
                        <?php
                        
                        $ctgSql = "SELECT * FROM categories";
                        $result = $conn->query($ctgSql);

                        $ctgCount = $result->num_rows;
                        echo $ctgCount;

                        // echo $result->num_rows;
                        ?>
                    </div>
                        <a href="categories.php" class="btn">View</a>
                    </div>
                    <div class="boxes orange-box">
                        <div class="box-title">Users</div>
                        <div class="numbers"><i class="fas fa-users"></i>
                        <?php
                        
                        $userSql = "SELECT * FROM user";
                        $result = $conn->query($userSql);

                        $userCount = $result->num_rows;
                        echo $userCount;

                        // echo $result->num_rows;
                        ?>
                    </div>
                        <a href="users.php" class="btn">View</a>
                    </div>

                </div>
            </div>
        </div>
<?php
include 'footer.php';
?>
    </div>
</body>

</html>