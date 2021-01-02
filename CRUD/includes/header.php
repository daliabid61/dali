<?php


// Get the application settings and parameters

require_once "config/params.php";
require_once ROOT."../includes/classes/session.php";
require_once ROOT."dbconnection.php";
require_once ROOT."../includes/classes/commons.php";

// Start the session if it's not yet started 
// and make it available on 
// all pages which include the header.php
!isset($_SESSION) ? session::init(): null;

// Get some common objects ready for various files
$dbh    = new Dbconnect();
$commons = new Commons($dbh);