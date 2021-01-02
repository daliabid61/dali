<?php


    /*
     * We process the admin login form here
     */

    // Start from getting the hader which contains some settings we need
    require_once 'includes/header.php';


    // require the admins class which containes most functions applied to admins
    require_once ROOT."../includes/classes/admin-class.php";

    $admins     = new Admins($dbh);

    // Let's process the form now
    // Starting by checking if the forme has been submitted
    if (!isset($_POST) || sizeof($_POST) == 0 )
    {
        session::set('error', 'Submit the form first.');
        $commons->redirectTo(SITE_PATH.'index.php');
    }

    // If the form is submitted, let's check if the fields are not empty
    if ($commons->isFieldEmpty($_POST['username']) || $commons->isFieldEmpty($_POST['password']) ) 
    {
        session::set('error', 'All fields are required.');
        $commons->redirectTo(SITE_PATH.'index.php');

    }

    // Now let's check if the the username and password match a line in our table

    $username = htmlspecialchars( $_POST['username'], ENT_QUOTES, 'UTF-8' );
    $password = htmlspecialchars( $_POST['password'], ENT_QUOTES, 'UTF-8' );

    if (!$admins->loginAdmin($username, $password)) 
    {
        session::set('error', 'Cannot connect you. Check your credentials.');
        $commons->redirectTo(SITE_PATH.'index.php');

    }

    // Otherwise we can set a session to the admin and send him to the dashboard
    // The session will hold only the username.
    session::set('admin_session', $username);
    $commons->redirectTo(SITE_PATH.'dashboard.php');