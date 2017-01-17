<p>Update an entry in the database</p>

<?php

$theID = getID();

$Manufacturer = null;
$Model = null;
$Horsepower = null;
$TopSpeed = null;
$Range = null;

if ($theID) {
    $res = prepareSQL($db, null, $theID);
    if (empty($res)) {
        die("No such ID");
    }

    list($theID, $Manufacturer, $Model, $Horsepower, $TopSpeed, $Range) = $res[0];
}

?>

<form method="post" action="db-process.php">
    <fieldset>
        <legend>Update plane</legend>
        <p><label>ID<br><input type="number" name="ID" value="<?=$theID?>" readonly></label></p>
        <p><label>Manufacturer<br><input type="text" name="Manufacturer" value="<?=$Manufacturer?>"></label></p>
        <p><label>Model<br><input type="text" name="Model" value="<?=$Model?>"></label></p>
        <p><label>Horsepower<br><input type="number" name="Horsepower" value="<?=$Horsepower?>"></label></p>
        <p><label>Top Speed (kts)<br><input type="number" name="TopSpeed" value="<?=$TopSpeed?>"></label></p>
        <p><label>Range (nm)<br><input type="number" name="Range" value="<?=$Range?>"></label></p>
        <p><input type="submit" name="save" value="Save"></p>
    </fieldset>
</form>

<?php

printAllPlanes($db);

?>
