<?php
include "functions.php";
if (isset($_POST['insert'])){
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $Email = $_POST['email'];

    $db = new DB_con();
    $db->insert($fname, $lname, $Email);
}

?>

<body>
<h1>Registration Form</h1>
<form action="insert.php" method="POST">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" required><br><br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="insert" name="insert">
</form>
</body>
