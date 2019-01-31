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
<body class="postone">
    <div class="container-fluid p-0">
            <?php
    include 'menu.php';
        ?>
        <div class="jumbotron bg-primary rounded-0 mb-0">
            <h1><i class="fas fa-pen"></i>Edit POST</h1>
        </div>
        <div class="common-wrap">
            <div class="psotone-area">
<?php
    if(isset($_POST['editpost'])){

    $postID = $_POST['postID'];

    $sql = "SELECT * FROM posts WHERE postID = '$postID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $postTitle = $row['postTitle'];
        $postDetails = $row['postDetails'];

        echo "<form method='post' action=''>";

        echo "<br><br>";
        echo "<h2 class='bg-light'>postTitle:<br><input type='text' name='postTitle' value='$postTitle'></h2>";
        echo "postDetails : <br><textarea type='text' name='postDetails' rows='5' class='w-100' >".$postDetails."</textarea>";
        echo "<div class='update-area'><input type='hidden' name='postID' value='$postID'>";
        echo "<input type='submit' name='update' value='update' class='btn btn-primary update-btn'><div>";
        // echo 'MOBILE: ' .$row['mobile']. '<br>';
        //input タグを書き込むことで、書き換えができるように準備している。
        echo '<div></form>';

        //update of table

        // if(isset($_POST['update'])){
        //     echo 'testtest';

        // $postTitle = $_POST['postTitle'];
        // $postDetails = $_POST['postDetails'];
        // $postID = $_POST['postID'];

        // $sql = "UPDATE posts SET postTitle = '$postTitle', postDetails = '$postDetails' WHERE postID = '$postID'";

        // if ($conn->query($sql)==TRUE) {
        // header("Location: dashboard.php");
        //     # code...
        // }else{
        //     echo "Updating error." .$conn->error;
        // }
        }
         
    }else{
        echo " " .$conn->connect_error;
        //errorの内容を確認するためのコード
    }
            if(isset($_POST['update'])){
            echo 'testtest';

        $postTitle = $_POST['postTitle'];
        $postDetails = $_POST['postDetails'];
        $postID = $_POST['postID'];

        $sql = "UPDATE posts SET postTitle = '$postTitle', postDetails = '$postDetails' WHERE postID = '$postID'";

        if ($conn->query($sql)==TRUE) {
        header("Location: dashboard.php");
            # code...
        }else{
            echo "Updating error." .$conn->error;
        }

}

   

?>              </div>
        </div>
<?php
include 'footer.php';
?>
    </div>
    
</body>
</html>