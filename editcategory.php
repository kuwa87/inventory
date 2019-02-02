<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Permanent+Marker" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="blog.css">
</head>
  <body class="postone">
      <div class="container-fluid p-0">
      <?php
    include 'menu.php';
    // include 'Category.php';
    $category_id = $_GET['category_id'];
    $categories = new Category;
    $row = $categories->echo_category($category_id);
    ?>
            <div class="jumbotron bg-primary rounded-0 mb-0">
            <h1><i class="fas fa-pen"></i>Edit Users</h1>
        </div>
        <div class="common-wrap">
            <div class="psotone-area">

        <!-- <div class="jumbotron p-3 text-white bg-dark rounded-0">Users</div> -->
        <form action="" method="post" class="p-5">
            <div class="form-group">
            <label for="category_name">Category name</label>
            <input type="text" name="category_name" class="form-control" id="category_name" value="<?php echo $row['category_name'];?>">            
            </div>
            <input type="submit" value="submit" name="submit" class="btn btn-primary btn-block">

            <?php
            if(isset($_POST['submit'])){
                $category_name = $_POST['category_name'];

                $categories = new Category();

                $categories->change($category_name,$category_id);

            }
            ?>  

        </form>
        </div>
        </div>
  </body>
</html>