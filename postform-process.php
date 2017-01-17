<?php
// Load config.php
include("incl/config.php");



// Check if style is changed and then set it
$style = isset($_POST['style'])
    ? $_POST['style']
    : null;

// Check incoming value
is_string($style) or is_null($style)
    or die("Incoming value for page must be a string.");

if ($style !== null) {
    $_SESSION['stylesheet'] = $style;
}

// To debug a processingpage, before it does its redirect
//var_dump($_SESSION);
//die();

// Redirect to the previous page
header("Location: " . $_SESSION['currentpage']);
