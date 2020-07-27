<?php
$busno = $_GET['busno'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
require('db.php');
//$dbname = "gps bus management";
//$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
//if (!$conn) {
 //   die("Connection failed: " . mysqli_connect_error());
//}

// sql to delete a record
$sql = "DELETE FROM buses WHERE busno = $busno"; 

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: buses_table.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>