<?php require_once './DashboardHeader.php' ?>
<div class="container">
<?php

$columns = $product->getColumnsFromTable('product');

// Remove register time and id field from array(send by default)
array_shift($columns);

// This function is default in PHP 8 but in PHP 7 you should write it manually
function str_contains($haystack, $needle) {
    return $needle !== '' && mb_strpos($haystack, $needle) !== false;
}

function get_html_type($type, $name){
    if($type == 253){
        if(str_contains($name, 'image')){
            return 'type="file"';
        } else {
            return 'type="text"';
        }
    } else if ($type == 5){
        return 'type="number" step="0.01"';
    }
}


$id = $_GET['id'];

$item = $product->getProductById($id);


?>


    <h2>Edit Item</h2>
    <form action="actions/EditItem.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?= $id ?>">
        <?php
        foreach($columns as $column){
            echo '

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">'. 
                ucfirst(str_replace("product_", "",$column->name)) 
                .'</label>
                <input '. get_html_type($column->type, $column->name) .' class="form-control" name="'. 
                str_replace("product_", "",$column->name) 
                .'" value="'.  $item[0][$column->name] .'">
                
            </div>

            ';
            
        }
        ?>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>
