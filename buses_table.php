<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Users table</title>
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="<script src="js/bootstrap.min.js"></script></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>

<div class="menu">
    <div class="p-3 mb-2 bg-info text-white" id="heading1">
        <h2><a class="text-white" href="manager_index.php">BUS MANAGEMENT SYSTEM</a></h2>
        <!--<small class="text-muted">Welcome to our homepage</small>-->
    </div>
    

    <?php echo '<center><div class="alert alert-success mt-3" role="alert">
  MANAGER LOGGED IN
  </center></button>
</div>' ?>  
		<div class="ml-3">
			<ul class="nav nav-pills">
			  <li class="nav-item">
			    <a class="nav-link" href="manager_index.php">Home</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="add_bus.php">Add new bus</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active" href="buses_table.php">Buses table</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="users_table.php">Users table</a>
			  </li>
			  <div class="navbar-nav ml-auto mr-3">
			  	<a class="btn btn-danger" href="manager_logout.php" role="button">Logout</a>
			  </div>
			</ul>
		</div>
	</div>
<br>
</html>
<?php

require('db.php');
include("auth.php");


$result = mysqli_query($con,"SELECT * FROM buses");

echo "<table class='table table-hover ml-2 '>
<caption>Buses table</caption>
<tr>
<th>Bus No.</th>
<th>Start station</th>
<th>End station</th>
<th>Route no.</th>
<th>Timing</th>
<th>Actions</th>
<th>Status</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['busno'] . "</td>";
echo "<td>" . $row['start_station'] . "</td>";
echo "<td>" . $row['end_station'] . "</td>";
echo "<td>" . $row['routeno'] . "</td>";
echo "<td>" . $row['timing'] . "</td>";
echo "<td><a href='update_bus.php?busno=".$row['busno']."'><button type='button' class='btn btn-warning'>Update</button></a>
	<a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_bus.php?busno=".$row['busno']."'><button type='button' class='btn btn-danger ml-1'>Delete</button></a></td>";

$status =  $row['status'];
if ($status == 'On time') {
    	echo "<td class='text-success font-weight-bold'>" . $status . "</td>";
}

if ($status == 'Cancelled') {
    	echo "<td class='text-danger font-weight-bold'>" . $status . "</td>"; 
}
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>