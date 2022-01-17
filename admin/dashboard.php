<?php 

require_once "./DashboardHeader.php" ;

// Search product by any field functionality

// Is it necessary to put it somewhere else or not... 
if(isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `product` WHERE CONCAT(`product_id`, `product_name`, `product_price`, `product_brand`, `product_category`, `product_color`, `product_info`, `product_type`) LIKE '%" . $valueToSearch . "%'";

    $search_result = $db->connection->query($query);

} else {
    $query = "SELECT * FROM `product`";
    $search_result = $db->connection->query($query);
}
?>

    <div class="container">
    <div class="row">
        <main class="ms-sm-auto col-lg-12 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <form class="input-group w-50" method="post">
                <input type="text" class="form-control" placeholder="Value to search..." aria-label="Search by name..." aria-describedby="button-addon2" name="valueToSearch">
                <button class="btn btn-outline-secondary" type="submit" id="search_btn" name="search">Search</button>
            </form>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="add-item.php" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 20 20">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Create new product</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Color</th>
                <th scope="col">Brand</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Info text</th>
                <th scope="col">Actions</th>
                <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
            <?php
            
            // Integrated with product search system
            while($item = mysqli_fetch_array($search_result)){
                echo '
                <tr>
                    <td>' . $item['product_id'] . '</td>
                    <td>' . $item['product_name'] . '</td>
                    <td>' . $item['product_price'] . '</td>
                    <td>' . $item['product_category'] . '</td>
                    <td>' . $item['product_color'] . '</td>
                    <td>' . $item['product_brand'] . '</td>
                    <td>' . $item['product_type'] . '</td>
                    <td><img src="../' . $item['product_image'] . '" alt="product" width="100" height="100"></td>
                    <td>' . $item['product_info'] . '</td>
                    <td> <a href="./edit-item.php?id='. $item['product_id'] .'" class="btn btn-outline-warning">Edit</a> </td>
                    <td> <a href="./actions/DeleteItem.php?id='. $item['product_id'] .'" class="btn btn-outline-danger ">Delete</a> </td>
                </tr>
                ';
            }

            ?>
            </tbody>
            </table>
        </div>
        </main>
    </div>
    </div>
   
</body>
</html>