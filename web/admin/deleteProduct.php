
<?php

$mysqli = mysqli_connect("localhost", "root", "", "pannier") or die("0");

$theId = $_GET["id"];



$obj2 = $mysqli->query("DELETE FROM `tbl_product` WHERE `tbl_product`.`id` = $theId") or die("0");


echo "1";





?>