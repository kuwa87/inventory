<!DOCTYPE html>
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
<body class="items">
    <div class="container-fluid p-0">
                <?php
    include 'menu.php';
        ?>
        <div class="jumbotron bg-orange-original rounded-0 mb-0">
            <h1><i class="fas fa-users"></i>Dashboard</h1>
        </div>
        <div class="bg-light top-area"></div>
        <div class="common-wrap">
        <form action="" method="post" class="p-5">
            <div class="form-group">
            <label for="category_id">Category Name</label>
            <select id="language" name="category_id">
            <option value=""></option>       
            <?php
            $category = new Category;
            $result = $category->get_category();
            foreach($result as $row){
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
                echo "<option value='$category_id'>$category_name</option>";

            }
            ?>
            </select>
            <!-- <input type="text" name="category_id" class="form-control" id="category_id">             -->
            </div>
            <div class="form-group">
            <label for="item_name">item name</label>
            <input type="text" name="item_name" class="form-control" id="item_name">            
            </div>
            <div class="form-group">
            <label for="item_price">item price</label>
            <input type="text" name="item_price" class="form-control" id="item_price">            
            </div>
            <div class="form-group">
            <label for="item_quantity">item quantity</label>
            <input type="text" name="item_quantity" class="form-control" id="item_quantity">            
            </div>
            <input type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
            <?php
            include 'Item.php';
            if(isset($_POST['submit'])){
                $category_id = $_POST['category_id'];
                $item_name = $_POST['item_name'];
                $item_price = $_POST['item_price'];
                $item_quantity = $_POST['item_quantity'];
                $item_quantity = $_POST['item_status'];

                $items = new Item();

                $items->insert($category_id,$item_name,$item_price,$item_quantity);

            }
            ?>  

        </form>
        </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>