<?php
    // Start from getting the hader which contains some settings we need
    require_once 'includes/header.php';

    // Redirect visitor to the login page if he is trying to access
    // this page without being logged in
    if (!isset($_SESSION['admin_session']) )
    {
        $commons->redirectTo(SITE_PATH.'index.php');
    }

    // Get the product ID
    $productId = isset($_GET['id']) && intval($_GET['id']) > 0 ? intval($_GET['id']) : 0;

    if ($productId > 0) {
        // require the admins class which containes most functions applied to admins
        require_once ROOT."../includes/classes/admin-class.php";

        $admins     = new Admins($dbh);
        $productDetails = $admins->getAProduct($productId);
    }
?>

<?php if (isset($productDetails) && sizeof($productDetails) > 0) : $product = $productDetails[0]; ?>
<!-- We will use a simple table to display the product -->
<h1>Edit: <?= htmlentities(strip_tags($product->product_name)) ?></h1>
<hr>
<?php  if ( isset($_SESSION['errors']) ): ?>
<div class="pannel panel-warning">
    <?php foreach ($_SESSION['errors'] as $error):?>
        <li><?= $error ?></li>
    <?php endforeach ?>
</div>
<?php session::destroy('errors'); endif ?>

<?php  if ( isset($_SESSION['confirm']) ): ?>
<div class="pannel panel-success">
    <li><?= $_SESSION['confirm'] ?></li>
</div>
<?php session::destroy('confirm'); endif ?>


<!-- We send the form information to process-new-admin.php to handle it -->
<form action="process-edited-product.php" method="POST">
<div>
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" value="<?= isset($product->product_name) ? htmlspecialchars(strip_tags($product->product_name)) : '' ?>">

    <input type="hidden" name="id" value="<?= isset($product->id) ? htmlspecialchars(strip_tags($product->id)) : '' ?>">
</div>

<div>
    <label for="price">Price(Unit)</label>
    <input type="number" name="price" id="price" min="1" step="any" value="<?= isset($product->product_price) ? htmlspecialchars(strip_tags($product->product_price)) : '' ?>">
</div>

<div>
    <label for="expiry">Expires on</label>
    <input type="date" name="expiry" id="expiry"  value="<?= isset($product->product_expires_on) ? htmlspecialchars(strip_tags($product->product_expires_on)) : '' ?>">
</div>

<div>
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10"><?= isset($product->product_description) ? htmlspecialchars(strip_tags($product->product_description)) : '' ?></textarea>
</div>

<div class="activate">
    <button type="submit" class="btn-1a">Save changes</button>
</div>
</form>