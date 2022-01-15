<?php ob_start(); ?>
<?php include './header.php'; ?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <?php include './components/shop/ProductSidebar.php'; ?>
            <?php include './components/shop/Products.php' ?>
        </div>
    </div>
</section>

<?php include './footer.php'; ?>