<?php
// Load config.php
include("incl/config.php");

// Get selected page, or the default
$page = isset($_GET['page']) ? $_GET['page'] : "intro";

// Check incoming value
is_string($page) or is_null($page)
    or die("Incoming value for page must be a string.");

// Directory of content files
$dir = dirname(dirname(__DIR__)) . "/kmom03/multi/content";

// All the pages
$multipage = [
    "intro"    => "intro.php",
    "print-server"  => "print-server.php",
    "print-get"      => "print-get.php",
    "get-samples" => "get-samples.php",
    "get-value" => "get-value.php",
    "print-request" => "print-request.php",
];

// Get the contentfile to include
if (isset($multipage[$page])) {
    $file = $multipage[$page];
} else {
    die("The value of ?page=" . htmlentities($page) . " is not recognized as a valid page.");
}

// Load header.php
include("incl/header.php");
// Load multinav
include("incl/multinav.php");
?>
    <aside>
        <?php
        // Load aside.php
        include("../../kmom03/multi/aside.php");
        ?>
    </aside>
    <main class="multi">
        <article>

            <?php
            // Load the selected page
            include("$dir/$file");
            ?>

            <footer>
                <?php
                // Load byline.php
                include("incl/byline.php");
                ?>
            </footer>
        </article>
    </main>
    <?php
    // Load footer.php
    include("incl/footer.php");
    ?>
