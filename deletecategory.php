<?php

    include 'Category.php';
    $category_id = $_GET['category_id'];
    $categories = new Category;
    $row = $categories->get_category($category_id);
    $delete = $categories->delete($category_id);


?>