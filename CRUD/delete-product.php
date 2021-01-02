<?php
    // Start from getting the hader which contains some settings we need
    require_once 'includes/header.php';

    // Redirect visitor to the login page if he is trying to access
    // this page without being logged in
    // in here this condition will help protect our products from attackers
    if (!isset($_SESSION['admin_session']) )
    {
        $commons->redirectTo(SITE_PATH.'index.php');
    }

    // Get the product ID
    $productId = isset($_GET['id']) && intval($_GET['id']) > 0 ? intval($_GET['id']) : 0;

    if ($productId > 0) 
    {
        // require the admins class which containes most functions applied to admins
        require_once ROOT."../includes/classes/admin-class.php";

        $admins     = new Admins($dbh);
        // Call the delete method
        $productDetails = $admins->deleteProduct($productId);

        // redirect to the list of items
        $commons->redirectTo(SITE_PATH.'list-products.php');
    }