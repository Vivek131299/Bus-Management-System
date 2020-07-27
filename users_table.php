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
			    <a class="nav-link" href="buses_table.php">Buses table</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active" href="users_table.php">Users table</a>
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


$result = mysqli_query($con,"SELECT * FROM users");

echo "<table class='table table-hover ml-3 mr-3'>
<caption>Users table</caption>
<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Password</th>
<th>Registration date</th>
<th>Actions</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
echo "<td>" . $row['trn_date'] . "</td>";
echo "<td><a href='update_user.php?id=".$row['id']."'><button type='button' class='btn btn-warning'>Update</button></a>
	<a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_user.php?id=".$row['id']."'><button type='button' class='btn btn-danger ml-1'>Delete</button></a></td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>