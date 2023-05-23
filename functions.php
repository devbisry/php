<?php

class DB_con {
    private $conn;
    private $dbname = 'class';
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';

    public function __construct() {
        try {
            $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insert($fname, $lname, $email) {
            $stmt = "INSERT INTO users(First_Name, Last_name, Email) VALUES('$fname','$lname', '$email' )";
            mysqli_query($this->conn, $stmt);
            echo "Record inserted successfully.";
    }

    public function fetchdata() {
            $stmt = "SELECT * FROM users";
            $stmtQ = mysqli_query($this->conn, $stmt);
            echo "<table>";
            echo "<tr><td> ID</td><td>First Name</td><td>Last Name </td> <td>Email</td></tr>";
            while($row = mysqli_fetch_array($stmtQ)){
                echo "<tr><td>".$row['ID']."</td><td>".$row['First_Name']."</td><td>".$row['Last_name'].
                    "</td><td>".$row['Email']."</td><td><button type='button' onclick="."location.href='deleter.php?deleteID=".
                    $row['ID']."'".">Delete</button></td><td><button type='button' onclick="."location.href='updater.php?updateID=".
                    $row['ID']."'".">Update</button></td></tr>
";

            }
            echo "</table>";
    }

    public function fetchonerecord($userid) {
        try {
            $stmt = "SELECT * FROM users WHERE ID = '$userid'";
            $stmtQ = mysqli_query($this->conn, $stmt);
            echo "<table>";
            echo "<tr><td> ID</td><td>First Name</td><td>Last Name </td> <td>Email</td></tr>";
            while($row = mysqli_fetch_assoc($stmtQ)){
                echo "<tr><td>".$row['ID']."</td><td>".$row['First_Name']."</td><td>".$row['Last_name']."</td><td>".$row['Email']."</td></tr>";

            }
            echo "</table>";
        } catch(PDOException $e) {
            echo "Fetching one record failed: " . $e->getMessage();
        }
    }

    public function update($id, $fname, $lname, $email) {
        try {
            $stmt = "UPDATE users SET First_Name='$fname', Last_name='$lname', Email='$email' WHERE ID='$id'";
            mysqli_query($this->conn, $stmt);
            echo "Record updated successfully.";
        } catch (mysqli_sql_exception $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }

    public function delete($rid) {
        try {
            $stmt = "DELETE FROM users WHERE ID = '$rid'";
            mysqli_query($this->conn, $stmt);
            echo "Record deleted successfully.";
        } catch(PDOException $e) {
            echo "Deletion failed: " . $e->getMessage();
        }
    }
}
?>
