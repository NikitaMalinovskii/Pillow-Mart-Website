<?php require_once './DashboardHeader.php' ?>
<div class="container">
<?php

$columns = $product->getColumnsFromTable('product');

// Remove register time and id field from array(send by default)
array_shift($columns);
array_pop($columns);

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

?>
    <form action="actions/AddItem.php" method="POST" enctype="multipart/form-data">
        <?php
        foreach($columns as $column){
            echo '

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">'. 
                ucfirst(str_replace("product_", "",$column->name)) 
                .'</label>
                <input '. get_html_type($column->type, $column->name) .' class="form-control" name="'. 
                str_replace("product_", "",$column->name) 
                .'">
            </div>

            ';
        }
        ?>
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>
