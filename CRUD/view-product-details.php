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
<h1><?= htmlentities(strip_tags($product->product_name)) ?></h1>
<hr>
<table width="100%" border="0">

<tr>
    <td>Price</td>
    <td>: <strong><?= htmlentities(strip_tags($product->product_price)) ?></strong> </td>
</tr>
<tr>
    <td>Expiry date</td>
    <td>: <strong><?= htmlentities(strip_tags($product->product_expires_on)) ?></strong> </td>
</tr>

<tr>
    <td colspan="2">
    <br>
        <?= htmlentities(strip_tags(nl2br($product->product_description))) ?>
    </td>
</tr>

</table>
    <br>
    <hr>
    <br>
<ul class="btns">
    <li><a href="edit-product.php?id=<?= $product->id ?>" class="btn-1a">Edit</a></li>
    <li><a href="delete-product.php?id=<?= $product->id ?>" class="btn-1a" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></li>

</ul>

<?php else: ?>
<h3>No product is select.</h3>
<?php endif ?>