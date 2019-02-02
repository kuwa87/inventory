<?php

    include 'Item.php';
    $item_id = $_GET['item_id'];
    $items = new Item;
    $row = $items->get_item($item_id);
    $delete = $items->delete($item_id);


?>