<?php
// Load config.php
include("incl/config.php");

// Get the selected page, or the default one
$page = (isset($_GET['page'])) ? $_GET['page'] : "intro";

// Validate incoming
is_string($page) or is_null($page)
    or die("Incoming value for page must be a string.");

// Directory of content files
$dir  = dirname(dirname(__DIR__)) . "/kmom04/stylechooser/content/";

// All the pages
$multipage = [
    "intro"    => "intro.php",
    "current"  => "current-value.php",
    "get"      => "change-get.php",
    "dropdown" => "change-dropdown.php",
    "post-dropdown" => "post-dropdown.php",
    "postform" => "postform.php",
    "style-dropdown" => "style-dropdown.php",
];

// Get the contentfile to include
if (isset($multipage[$page])) {
    $file = $multipage[$page];
} else {
    die("The value of ?page=" . htmlentities($page) . " is not recognized as a valid page.");
}

// Load header
include("incl/header.php");
// Load multinav
include("incl/multinav.php");
?>

    <aside><?php
    // Load aside.php
    include("../../kmom04/stylechooser/aside.php");
    ?></aside>

    <main class="stylechooser">
        <article>
            <?php
            // Load the selected page
            include("$dir/$file");
            ?>
        </article>
    </main>
    <?php
    // Load footer
    include("incl/footer.php");
    ?>
