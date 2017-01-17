<?php
// Get and save current page in session
$_SESSION['currentpage'] = basename($_SERVER["REQUEST_URI"]);
// Get and save the file name of current page
$thisPage = basename($_SERVER['SCRIPT_NAME']);
// Debugging
// var_dump($_SESSION['currentpage']);
?>
<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <!-- Page title -->
    <title><?= title($thisPage) ?></title>
    <!-- Stylesheet -->
    <link href="<?=$stylesheet?>" rel="stylesheet" type="text/css" media="all">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0;
    maximum-scale=2.0;">
</head>
<body>
    <header class="site-header">
        <!-- Site Logo -->
        <img src="img/logo.png" alt="logo" class="site-logo">
        <!-- Site heading -->
        <span class="site-title">André Johansson's Me-sida</span>
        <!-- Site slogan -->
        <span class="site-slogan">Were we go, others can only follow</span>
        <!-- The dropdown for stylesheet selection -->
        <form method="post" action="postform-process.php">
            <label class="style-dropdown">
                <select name="style" onchange="form.submit();">
                    <option value="default" <?=$selected == "default" ? "selected" : ""; ?>>Blue style</option>
                    <option value="second" <?=$selected == "second" ? "selected" : "";?>>Old style</option>
                    <option value="third" <?=$selected == "third" ? "selected" : ""; ?>>Light style</option>
                </select>
            </label>
        </form>
    </header>
    <!-- Site navigation -->
    <nav class="site-nav">
        <ul>
            <li><a <?= selected("me.php") ?> href="me.php">Hem</a></li>
            <li><a <?= selected("report.php") ?> href="report.php">Redovisning</a></li>
            <li><a <?= selected("multipage.php"), selected("nymultipage.php"),
            selected("stylechooser.php"), selected("jetty.php"), selected("admin.php") ?>
            href="multipage.php">Multisidor</a></li>
            <li><a <?= selected("search.php") ?> href="search.php">Sök</a></li>
            <li><a <?= selected("about.php") ?> href="about.php">Om</a></li>
        </ul>
    </nav>
