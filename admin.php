<?php
// Load config.php
include("incl/config.php");

// Get and save current page in session
$_SESSION['currentpage'] = basename($_SERVER["REQUEST_URI"]);

// Get the selected page, or the default
$page = (isset($_GET['page'])) ? $_GET['page'] : "intro";

// Check incoming value
is_string($page) or is_null($page)
    or die("Incoming value for page must be a string.");

// Directory the content-files
$dir  = __DIR__ . "/content/";

// Array with all the pages
$multipage = [
    "intro"    => "intro.php",
    "create"  => "create.php",
    "update"      => "update.php",
    "delete" => "delete.php",
    "read" => "read.php",
];

// Get the file to include
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
    include("incl/aside.php");
    ?></aside>

    <main class="admin">
        <article>
            <?php
            // Load selected page
            include("$dir/$file");
            ?>
        </article>
    </main>
    <?php
    // Load footer
    include("incl/footer.php");
    ?>
