<?php
// Load config.php and header.php
include("incl/config.php");
include("incl/header.php");

// Get incoming from search form
$search = isset($_POST['search'])
    ? $_POST['search']
    : null;

// Check incoming value
is_string($search) or is_null($search)
    or die("Incoming value for page must be a string.");

?>

    <main class="search">

        <figure class="fig-search">
            <img src="img/plane.png" alt="Bild på en Cessna">
        </figure>
        <!-- The search form -->
        <form method="post" action="search.php">
            <input type="search" name="search" value="<?=$search?>" placeholder="Search for a model or manufacturer..."><br>
            <input type="submit" value="Search">
            <input type="submit" name="submit" value="Show all">
        </form>

<!-- The result of the search -->
<?php

// Break script if empty $search
if (is_null($search)) {
    echo "<p>Nothing to display, please enter a searchstring.</p>";
} else {
    $searchWild = "%" . $search . "%";
    $res = prepareSQL($db, $searchWild, null);
}

if (isset($_POST["submit"])) {
    printAllPlanes($db);
} elseif (isset($_POST['search'])) {
    printPlanesTable($res);
}

?>

    </main>

<?php
// Load footer.php
include("incl/footer.php");
?>
