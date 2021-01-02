<?php
    // Start from getting the hader which contains some settings we need
    require_once 'includes/header.php';

    // Redirect visitor to the login page if he is trying to access
    // this page without being logged in
    if (!isset($_SESSION['admin_session']) )
    {
        session::destroy('admin_session');
        $commons->redirectTo(SITE_PATH.'index.php');
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
            <a href="http://phpocean.com/tutorials/back-end/make-your-first-crud-with-php-case-of-a-product-management-system/34" class="btn btn-4 btn-4d icon-arrow-left">Return to tutorial</a>
            <div class="admin-pannel">

                <div class="dashboard">
                    <h3>Add Admin</h3>
                    <hr>
                    <p>Please fill in the form bellow to add a new admin.</p>

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
                    <form action="process-new-admin.php" method="POST">
                        <div>
                            <label for="username">New Admin Username</label>
                            <input type="text" name="username" id="username">
                        </div>

                        <div>
                            <label for="password">New Admin Password</label>
                            <input type="password" name="password" id="password">
                        </div>

                        <div>
                            <label for="repassword">Re-enter Password</label>
                            <input type="password" name="repassword" id="repassword">
                        </div>

                        <div class="activate">
                            <button type="submit" class="btn-1a">Save Admin</button>
                        </div>
                    </form>
                </div>
                <aside class="admin-menu">
                    <p>Connected as, <?= strip_tags($_SESSION['admin_session']) ?></p>
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="add-admin.php">Add Admin</a></li>
                        <li><a href="add-product.php">Add Product</a></li>
                        <li><a href="list-products.php">List Products</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </aside>

                <div style="clear:both"> </div>
            </div>

            <footer>
                <?= date("Y") ?> &copy; phpocean.com - Project by <a href="http://zooboole.me" target="_blank">zooboole</a> - Credit to <a href="http://tympanus.net/codrops/2013/06/13/creative-button-styles/" target="_blank">tympanus.net</a>
            </footer>
        </main>
    </body>
</html>