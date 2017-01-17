<?php
// Start session
$name = substr(preg_replace('/[^a-z\d]/i', '', dirname(__DIR__)), -30);
session_name($name);
session_start();

// Valid stylesheets and valid values to store in the session
$stylesheets = [
    "default" => "css/style.css",
    "second" => "css/second.css",
    "third" => "css/third.css",
];

// Get current stylesheet from the session, or use default
$key = isset($_SESSION['stylesheet'])
    ? $_SESSION['stylesheet']
    : "default";

// Check value of $_SESSION['stylesheet'], debugging
//var_dump($_SESSION['stylesheet']);

// See if the key matches a stylesheet
if (isset($stylesheets[$key])) {
    $stylesheet = $stylesheets[$key];
} else {
    die("The value of key='$key' does not match a valid stylesheet.");
}

// Check value of $stylesheet, debugging
//var_dump($stylesheet);

// Save selected stylesheet
$selected = (isset($_SESSION['stylesheet'])) ? $_SESSION['stylesheet'] : "default";

// Get script name of current page
$currentScript = basename($_SERVER['SCRIPT_NAME']);

// Get the query string of current page
$QueryString = basename($_SERVER['QUERY_STRING']);

/**
* Generate navbar link class for selected page
*/
function selected($pageURI)
{
    if ($GLOBALS['currentScript'] == $pageURI) {
        echo 'class="selected"';
    }
}

/**
* Generate navbar link class for selected page
*/
function active_multi($pageURI)
{
    if ($GLOBALS['currentScript'] == $pageURI) {
        echo 'class="active-multi"';
    }
}

/**
* Generate aside link class for multimenu & aside
*/
function active($pageURI)
{
    if ($GLOBALS['QueryString'] == $pageURI) {
        echo 'class="active"';
    } elseif ($pageURI == "") {
        $pageURI = "intro";
    } elseif (strpos($GLOBALS['QueryString'], $pageURI) !== false) {
        echo 'class="active"';
    }
}

/**
* Generate header title for pages. Collected in one place for easy editing
*/
function title($scriptName)
{
    $mainTitle = "André's Me-sida | ";
    $pageTitle = [
        "me.php" => $mainTitle . "htmlphp",
        "report.php" => $mainTitle . "Redovisning",
        "multipage.php" => $mainTitle . "Multipage",
        "nymultipage.php" => $mainTitle . "Multipage 2.0",
        "stylechooser.php" => $mainTitle . "Stylechooser",
        "about.php" => $mainTitle . "Om",
        "jetty.php" => $mainTitle . "Jetty",
        "search.php" => $mainTitle . "Sök Flygplan",
        "admin.php" => $mainTitle . "Database Admin",
    ];
    foreach ($pageTitle as $uri => $title) {
        if ($scriptName == $uri) {
            echo $title;
        }
    }
}

// Create a DSN for the database using its filename
$fileName = dirname(__DIR__) . "/db/planes.sqlite";
$dsn = "sqlite:$fileName";

/**
* Open the database file and catch the exception it it fails.
*/
function connectDatabase($dsn)
{
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>$dsn<br>";
    }
}

/**
* Prepare and execute SQL statement before printing
*/
function prepareSQL($db, $search, $theID)
{
    // Prepare and execute the SQL statement
    if ($GLOBALS['currentScript'] == "search.php") {
        $sql = "SELECT * FROM planes WHERE Manufacturer LIKE ? OR Model LIKE ?";
    } elseif ($GLOBALS['currentScript'] == "admin.php") {
        $sql = "SELECT * FROM planes WHERE ID = ?";
    }
    $stmt = $db->prepare($sql);

    // Execute the SQL statement using parameters to replace the ?
    if ($GLOBALS['currentScript'] == "search.php") {
        $params = [$search, $search];
    } elseif ($GLOBALS['currentScript'] == "admin.php") {
        $params = [$theID];
    }
    $stmt->execute($params);

    // Get the results as an array with column names as array keys
    if ($GLOBALS['currentScript'] == "search.php") {
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($GLOBALS['currentScript'] == "admin.php") {
        $res = $stmt->fetchAll(PDO::FETCH_BOTH);
    }
    return $res;
}

/**
* Print out the result as a HTML table using PHP heredoc
*/
function printPlanesTable($res)
{
    $rows = null;
    foreach ($res as $row) {
        $rows .= "<tr>";
        if (strpos($GLOBALS['QueryString'], "page=update") !== false) {
            $theID = $row['ID'];
            $rows .= "<td><a href='?page=update&ID=$theID'>{$theID}</a></td>";
        } elseif (strpos($GLOBALS['QueryString'], "page=delete") !== false) {
            $theID = $row['ID'];
            $rows .= "<td><a href='?page=delete&ID=$theID'>{$theID}</a></td>";
        } else {
            $rows .= "<td>{$row['ID']}</td>";
        }
        $rows .= "<td>{$row['Manufacturer']}</td>";
        $rows .= "<td>{$row['Model']}</td>";
        $rows .= "<td>{$row['Horsepower']}</td>";
        $rows .= "<td>{$row['Top Speed (kts)']}</td>";
        $rows .= "<td>{$row['Range (nm)']}</td>";
        $rows .= "</tr>\n";
    }
    echo <<<EOD
<table>
<tr>
    <th>ID</th>
    <th>Manufacturer</th>
    <th>Model</th>
    <th>Horsepower</th>
    <th>Top Speed (kts)</th>
    <th>Range (nm)</th>
</tr>
$rows
</table>
EOD;
}

/**
* Print out everything as a HTML table using PHP heredoc
*/
function printAllPlanes($db)
{

    // Prepare and execute the SQL statement
    $sql = "SELECT * FROM planes";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    printPlanesTable($res);
}

/**
* Use GET to get the ID
*/
function getID()
{
    $theID = isset($_GET['ID'])
        ? $_GET['ID']
        : null;
    return $theID;
}

$db = connectDatabase($dsn);
