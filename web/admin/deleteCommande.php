
<?php

$mysqli = mysqli_connect("localhost", "root", "", "pannier") or die("0");

$theId = $_GET["id"];



$obj2 = $mysqli->query("DELETE FROM `commandes` WHERE `commandes`.`id` = $theId") or die("0");


echo "1";

    header('Location:../mescommandes.php');




?>