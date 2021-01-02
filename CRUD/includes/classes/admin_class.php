<?php


    /*
     * We process the admin login form here
     */

    // Start from getting the hader which contains some settings we need
    require_once 'includes/header.php';


    // require the admins class which containes most functions applied to admins
    require_once ROOT."../includes/classes/admin-class.php";

    $admins     = new Admins($dbh);

    // check if the form is submitted


    if (isset($_POST)) 
    {
        // If the form is submitted

        // first we check if all required fields are filled out
        // In this case the productname, price and the expiry date
        $errors = array();

        foreach($_POST as $key => $value) 
        {
          if((empty($value) || trim($value) == '') && $key!='description') {
            $errors[$key] = "The field ".$key." should not be empty.";
          }
          $$key =  $value;
        }

        // Description is not set in the loop
        $description = $_POST['description'];

        // If there is any error we send back to the form
        if (!empty($errors) || sizeof($errors) != 0) 
        {
            session::set('errors', $errors);
            $commons->redirectTo(SITE_PATH.'add-product.php');
        }

        // We've checked everything, 
        // now we can CREATE the admin in the admins table



        if (!$admins->addNewProduct($name, $price, $expiry, $description)) 
        {

            session::set('errors', ['An error occured while saving the new product.']);
            $commons->redirectTo(SITE_PATH.'add-product.php');

        }

        // Else we display a confirmation message
        session::set('confirm', 'New product added successfully!');
        $commons->redirectTo(SITE_PATH.'add-product.php');

    }