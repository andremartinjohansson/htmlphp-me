<?php
// Load config.php
include("incl/config.php");

$add = isset($_POST['add']);
$save = isset($_POST['save']);
$delete = isset($_POST['delete']);

if ($add || $save) {
    $theID = $_POST['ID'];
    $Manufacturer = $_POST['Manufacturer'];
    $Model = $_POST['Model'];
    $Horsepower = $_POST['Horsepower'];
    $TopSpeed = $_POST['TopSpeed'];
    $Range = $_POST['Range'];

    $params = [$theID, $Manufacturer, $Model, $Horsepower, $TopSpeed, $Range];
    if ($save) {
        array_splice($params, 0, 1);
        array_push($params, $theID);
    }
} elseif ($delete) {
    $theID = $_POST['ID'];
    $params = [$theID];
}

if ($add) {
    $sql = "INSERT INTO planes VALUES(?, ?, ?, ?, ?, ?)";
} elseif ($save) {
    $sql = <<<EOD
UPDATE planes
    SET
        Manufacturer = ?,
        Model = ?,
        Horsepower = ?,
        [Top Speed (kts)] = ?,
        [Range (nm)] = ?
    WHERE
        ID = ?
EOD;
} elseif ($delete) {
    $sql = <<<EOD
DELETE FROM planes
    WHERE
        ID = ?
EOD;
}

$stmt = $db->prepare($sql);

try {
    $stmt->execute($params);
} catch (PDOException $e) {
    echo "<p>Failed to insert a new row, dumping details for debug.</p>";
    echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
    echo "<p>The error code: " . $stmt->errorCode();
    echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
    throw $e;
}

// To debug a processingpage, before it does its redirect
//var_dump($_SESSION);
//die();

//var_dump($params);
//exit();

// Redirect to the previous page
if ($save) {
    header("Location: " . "admin.php?page=update");
} elseif ($delete) {
    header("Location: " . "admin.php?page=delete");
} else {
    header("Location: " . $_SESSION['currentpage']);
}
