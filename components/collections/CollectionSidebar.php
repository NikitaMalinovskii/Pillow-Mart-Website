<?php 

$brands = array_unique($product->getColumnValues('product', 'product_brand'), SORT_REGULAR);

$colors = array_unique($product->getColumnValues('product', 'product_color'), SORT_REGULAR);


$types = array_unique($product->getColumnValues('product', 'product_type'), SORT_REGULAR);


?>

<div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 products-sidebar-filter">
<div class="filter-widget">
        <h4 class="fw-title">For <?php echo $category ?? 'null'; ?></h4> 
    </div>
<div class="filter-widget">


        <h4 class="fw-title">Categories</h4>
        <ul class="filter-catagories button-group" data-filter-group="type">
            <button data-filter="*" class="btn btn-light ">All categories</button>
            

            <?php

                foreach($types as $type){
                    echo '
                    <button class="bc-item btn btn-light" data-filter=".'. $type['product_type'] .'">  '. implode(' ', preg_split('/(?=[A-Z])/', $type['product_type'])) .'</button>
                    ';
                }   

            ?>
            
        </ul>
    </div>
    
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check button-group" data-filter-group="brand">

        <button class="bc-item btn btn-sm btn-warning text-white" data-filter="*">All brands</button>
        <?php

        foreach($brands as $brand){
            echo '
            <button class="bc-item btn btn-sm btn-warning text-white" data-filter=".'. $brand['product_brand'] .'">  '. implode(' ', preg_split('/(?=[A-Z])/', $brand['product_brand'])) .'</button>
            ';
        }   

        ?>

        </div>
    </div>
    

    <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose button-group" data-filter-group="color">
                
                <button class="cs-item btn btn-light bg-transparent border-0"  data-filter="*">All colors</button>
                <?php 
                
                foreach($colors as $color){
                    echo '
                    
                    <button class="cs-item btn btn-sm btn-light bg-transparent border-0" id="cs-'. $color['product_color'] .'"  data-filter=".'. $color['product_color'] .'">
                    <label class="cs-'. $color['product_color'] .'" for="cs-'. $color['product_color'] .'">'. ucfirst($color['product_color']) .'</label>
                    
                    ';
                }
                
                ?>
        </div>
    </div>
</div>