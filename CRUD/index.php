<?php

    // Start from getting the header which contains some settings we need
    require_once 'includes/header.php';

    // Prevent admin from comming back here
    // if he's already logged in
    if (isset($_SESSION['admin_session']) )
    {
        $commons->redirectTo(SITE_PATH.'dashboard.php');
    }

?>

<html>
    <head>
        <title>Products Management System | Admin Panel</title>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/CreativeButtons/css/component.css">
        <link rel="stylesheet" href="public/css/style.css">
    </head>

    <body>
        <main class="container">

            <div class="admin-box">
                <h3><i class="fa fa-lock"></i> Admin Access</h3>

                <?php  if ( isset($_SESSION['error']) ): ?>
                    <div class="pannel panel-warning">
                        <?= $_SESSION['error'] ?>
                    </div>
                <?php session::destroy('error'); endif ?>

                <form action="admin-access.php" method="post">
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="zooboole">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="MySecr3t Pass WORD">
                    </div>
                    <div class="activate">
                        <button type="submit" class="btn btn-1 btn-1a">Log in</button>
                    </div>
                </form>
            </div>

            <footer>
                <?= date("Y") ?> Â©  - Project by dali  - Credit to sculpture house
            </footer>
        </main>
    </body>
</html>