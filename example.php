<select name="" id=""></select>
<option value=""></option>
<?php
$category = new Category;
$result = $category->get_categories();
foreach($result as $row){
    $cat_id = $row['category_id'];
    $cat_name = $row['category_name'];
    echo "<option value='$cat_id'>$cat_name</option>";

}


//drop down for menu
//select for form
?>

if($row['permission'] == 'user'){
	$this->redirect(user/index.php);
	
}elseif($row['permission'] == 'user'){
	ec

}
	