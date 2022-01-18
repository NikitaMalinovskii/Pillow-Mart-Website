<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product_add_to_cart'])) {
        $Cart->addToCart($_POST['product_id']);
    }
}
?>
<div class="col-lg-9 order-1 order-lg-2">
    <div class="product-show-option">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="select-option">
                    <select class="sorting-price form-control">
                        <option value="" data-sort-value="original-order">Default</option>
                        <option value="" data-sort-value="price">Price up</option>
                        <option value="">Price down</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="product-list">
        <div class="row grid">
            <?php foreach ($collection_items as $item) : ?>
                <div class="col-lg-4 col-sm-6 grid-item <?php echo $item['product_brand'] ?> <?php echo $item['product_category'] ?> <?php echo $item['product_color'] ?> <?php echo $item['product_type'] ?>">
                    <div class="product-item">
                        <div class="pi-pic">
                            <a href="<?php printf('./%s?product_id=%s', 'product.php', $item['product_id']); ?>"> <img src="<?php echo $item['product_image']; ?>" alt=""></a>
                            <?php if ($item['product_price'] < 40) : ?>
                                <div class="sale pp-sale">Sale</div>
                            <?php endif; ?>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active">
                                    <form method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">


                                        <?php

                                        if (in_array($item['product_id'], $_SESSION['cart'] ?? [])) {
                                            echo '<button type="submit" class="bg-success text-white border-0" style="pointer-events: none;" name="product_add_to_cart"><i class="icon_bag_alt"></i></button>';
                                        } else {
                                            echo '<button type="submit" class="bg-warning text-white border-0" name="product_add_to_cart"><i class="icon_bag_alt"></i></button>';
                                        }
                                        ?>

                                    </form>
                                </li>
                                <li class="quick-view">

                                    <?php
                                    if (in_array($item['product_id'], $_SESSION['cart'] ?? [])) {
                                        echo '<a href="#" style="pointer-events: none;">In the cart</a>';
                                    } else {
                                        echo '<a href="#">+ Add to cart</a>';
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="category-name text-black-50">
                                <?php

                                // Divide brand class by capital letter
                                // Because in database we use one word like 'TommyHilfiger'
                                // to indicate brand
                                echo implode(' ', preg_split('/(?=[A-Z])/', $item['product_brand']));

                                ?></div>
                            <a href="./product.php">
                                <h5><?php echo $item['product_name']; ?></h5>
                            </a>
                            <div class="product-price">
                                $ <span><?php echo $item['product_price']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>