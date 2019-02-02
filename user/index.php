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
<body class="users">
    <div class="container-fluid p-0">
                <?php
    include 'menu.php';
    include_once '../item.php';
    include_once 'perchase.php';
        ?>
        <div class="jumbotron bg-orange-original rounded-0 mb-0">
            <h1>All items</h1>
        </div>
        <div class="bg-light top-area"></div>
        <div class="row">
            <?php

            $item = new Item;
            $result = $item->get_item();
            foreach($result as $row){
                extract($row);
                echo 
                '<div class="col-4 mt-5">
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">'.$item_name.'</h5>
                <p class="card-text">'.$item_price.'</p>';
                
                if ($item_status == 'available') {
                    echo ' <form action="" method="post">
                    <input type="hidden" name="item_id" value="$item_id">
                    <input type="number" class="form-control" max="$item_quantity" min="1"><br><br>
                    <input type="submit" name="buy" class="btn btn-primary text-white btn-block w-50" value="Buy">
                    </form>';
            }else{
                    echo ' <form action="" method="post">
                    <input type="hidden" name="item_id" value="$item_id">
                    <input type="number" class="form-control" max="$item_quantity" min="1"><br><br>
                    <input type="submit" name="buy" class="btn btn-primary text-white btn-block w-50" value="Soldout">
                    </form>';
            }
            echo '
            </div>
            </div>        
            </div>  
        </div>';
            }

            
            ?>
         
    </div>
    
</body>
</html>