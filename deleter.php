<?php
include "functions.php";
if (isset($_GET['deleteID'])){
    $id = $_GET['deleteID'];
    $db = new DB_con();
    $db->delete($id);
}

?>
