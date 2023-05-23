<?php
include "functions.php";
$db = new DB_con();
if (isset($_GET['updateID'])){
    $id = $_GET['updateID'];
    ?>
<form action="updater.php" method="POST">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="newFname" required><br><br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="newLname" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="newEmail" required><br><br>
    <input type="hidden" name="newID" value="<?php echo $id?>">

    <input type="submit" value="Update" name="update">
</form>
<?php

}
if (isset($_POST['update'])) {
    $id = $_POST['newID'];
    $newFname = $_POST['newFname'];
    $newLname = $_POST['newLname'];
    $newEmail = $_POST['newEmail'];
    $db->update($id, $newFname, $newLname, $newEmail);
    header('Location: displayAll.php');
}

?>