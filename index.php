<?php
require_once 'config.php';
require_once 'database.php';
require_once 'product.php';

$product = new Product();
$products = $product->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Website</title>
</head>
<body>
    <h1>Welcome to Our Store</h1>
    <div>
    
        <?php foreach($products as $product): ?>
            <div>
            <div>
            <img src="<?php echo $product['image'];?>" alt="img"/>
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['price'];?></p>
            <a href="cart.php?action=add&id=<?php echo $product['id'];?>">Add to Cart</a>
        </div>
        </div>
        <?php endforeach;?>
    </div>
    
</body>
</html>