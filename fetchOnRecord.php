<?php
include "functions.php";
if (isset($_POST['search'])){
    $id = $_POST['id'];
    $db = new DB_con();
    $db->fetchonerecord($id);
}
?>

<hr>

<form action="fetchOnRecord.php" method="post">
    <label>Enter the id of the record you want to Search</label>
    <input type="number" name="id" required>
    <input type="submit" name="search" value="Search">
</form>