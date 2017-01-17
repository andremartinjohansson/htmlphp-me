<p>Delete an entry from the database</p>

<?php

$theID = getID();

if ($theID) {
    echo <<<EOD
<form method="post" action="db-process.php">
    <fieldset>
        <legend>Delete plane</legend>
        <p><label>ID<br><input type="number" name="ID" value="$theID" readonly></label></p>
        <p><input type="submit" name="delete" value="Delete"></p>
    </fieldset>
</form>
EOD;
} else {
    echo "<p><strong>Select a boat to delete.</strong></p>";
}

printAllPlanes($db);

?>
