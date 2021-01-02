<?php
    // Start from getting the hader which contains some settings we need
    require_once 'includes/header.php';

    // Redirect visitor to the login page if he is trying to access
    // this page without being logged in
    if (!isset($_SESSION['admin_session']) )
    {
        $commons->redirectTo(SITE_PATH.'index.php');
    }

    // require the admins class which containes most functions applied to admins
    require_once ROOT."../includes/classes/admin-class.php";

    // This could be a counstant
    $numberOfProductsToFetch = 25;

    $admins     = new Admins($dbh);
    $products = $admins->fetchProducts($numberOfProductsToFetch);
?>
<h3>List Products</h3>
<?php if (isset($products) && sizeof($products) > 0) :?>
    <?php foreach ($products as $product) :?>
        <li><a href="view-product-details.php?id=<?= $product->id ?>" title="Click to view product"><?= htmlspecialchars(strip_tags($product->product_name)) ?></a></li>
    <?php endforeach ?>
<?php else: ?>
<h3>No product is added yet.</h3>
<?php endif ?>