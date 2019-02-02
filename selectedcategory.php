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
<body class="categories">
    <div class="container-fluid p-0">
                <?php
    include 'menu.php';
        ?>
        <div class="jumbotron bg-orange-original rounded-0 mb-0">
            <h1><i class="fas fa-users"></i>Categories</h1>
        </div>
        <div class="bg-light top-area"></div>
        <div class="common-wrap">
                <h2 class="bg-light common-h2">Categories</h2>
         <div class="table-wrap pt-5 pb-5">
                 <table class="table">
            <thead>
                <tr>
                    <th>item ID</th>
                    <th>Category name</th>
                    <th>item Name</th>
                    <th>item price</th>
                    <th>item quantity</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
<?php
                    include_once 'Item.php';
                    $categories = new Item;
                    $category_id = $_GET['category_id'];
                    $result = $categories->get_items_by_category($category_id);

                    // print_r($result);
                    // var_dump($result);

                    if ($result) {
                    foreach($result as $row){
                            // echo "<tr>";
                            // echo "<td>".$row['item_name']."</td>";
                            // echo "<td>".$row['category_name']."</td>";
                            // echo "<td><form></form>
                            // <a href='editcategory.php?category_id=$category_id&action=1' class='btn btn-sm btn-success'>Edit</a> <a href='deletecategory.php?category_id=$category_id&action=3' class='btn btn-sm btn-danger text-white'>Delete</a></td>";
                            // echo "</tr>";
                            $item_id = $row['item_id'];

                            echo "<tr>";
                            echo "<td>".$row['item_id']."</td>";
                            echo "<td>".$row['category_name']."</td>";
                            echo "<td>".$row['item_name']."</td>";
                            echo "<td>".$row['item_price']."</td>";
                            echo "<td>".$row['item_quantity']."</td>";
                            echo "<td>".$row['item_status']."</td>";
                            echo "<td><a href='edititems.php?item_id=$item_id&action=1' class='btn btn-sm btn-success'>Edit</a> <a href='deleteitem.php?item_id=$item_id&action=3' class='btn btn-sm btn-danger text-white'>Delete</a></td>";
                            echo "</tr>";

                    }

                }
?>
            </tbody>
        </table>
        <a href="createcategory.php" class="btn btn-primary">Add Category</a>
        </div>  
        </div>
    </div>
    
</body>
</html>