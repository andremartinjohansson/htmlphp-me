<p>Add an entry to the database.</p>

<form method="post" action="db-process.php">
    <fieldset>
        <legend>Add a plane</legend>
        <p><label>ID<br><input type="number" name="ID"></label></p>
        <p><label>Manufacturer<br><input type="text" name="Manufacturer"></label></p>
        <p><label>Model<br><input type="text" name="Model"></label></p>
        <p><label>Horsepower<br><input type="number" name="Horsepower"></label></p>
        <p><label>Top Speed (kts)<br><input type="number" name="TopSpeed"></label></p>
        <p><label>Range (nm)<br><input type="number" name="Range"></label></p>
        <p><input type="submit" name="add" value="Add"></p>
    </fieldset>
</form>

<?php

printAllPlanes($db);

?>
