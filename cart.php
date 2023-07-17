<?php
session_start();

require_once 'config.php';
require_once 'database.php';
require_once 'product.php';

$product = new Product();
if(isset($_GET['id'])) {
    $productData = $product->getProductById(($_GET['id']));

    if($productData) {
        $_SESSION['cart'][]=$productData;
        echo "Product addedto cart successfully";
    }
    else {
        echo "invalid product Id.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <h1>Cart</h1>
    <div>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
    <div> 
        <img src ="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" />
        <h2><?php echo $item['name'];?></h2>
        <p><?php echo $item['price'];?></p>
</div>
<?php endforeach;?>
<p>Your Cart is Empty</p>
<?php endif;?>
</div>
</body>
</html>