<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Bus</title>
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="<script src="js/bootstrap.min.js"></script></script>
<script src="<script src="js/bootstrap.js"></script></script>
<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['busno'])){
		$busno = stripslashes($_REQUEST['busno']); // removes backslashes
		$busno = mysqli_real_escape_string($con,$busno); //escapes special characters in a string
		$start_station = stripslashes($_REQUEST['start_station']);
		$start_station = mysqli_real_escape_string($con,$start_station);
		$end_station = stripslashes($_REQUEST['end_station']);
		$end_station = mysqli_real_escape_string($con,$end_station);
		$routeno = stripslashes($_REQUEST['routeno']);
		$routeno = mysqli_real_escape_string($con,$routeno);
		$timing = stripslashes($_REQUEST['timing']);
		$timing = mysqli_real_escape_string($con,$timing);

        $query = "INSERT into `buses` (busno, start_station, end_station, routeno, timing) VALUES ('$busno', '$start_station', '$end_station', '$routeno', '$timing')";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<div class='form'><h3>Bus information successfully added.</h3><br/>Click here to view <a href='buses_table.php'>Buses table</a></div>";

    	}
    }else{

?>

<div class="menu">
            <div class="p-3 mb-2 bg-info text-white" id="heading1">
                <h2><a class="text-white" href="manager_index.php">BUS MANAGEMENT SYSTEM</a></h2>
                <!--<small class="text-muted">Welcome to our homepage</small>-->
            </div>
			
			<!--
			<div>
				<ul class="nav nav-tabs">
					<li class="nav-item">
					<a class="nav-link" href="home.php">Home</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="registration.php">Register</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact Us</a>
					</li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">My Account</a>
                    </li>
                    <div class="navbar-nav ml-auto mr-3">
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manager
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="manager_login">Login</a>
                        <a class="dropdown-item" href="manager_reg">Registration</a>
                      </div>
                    </div>
                </div>
				</ul>
				<br>
			</div>
		-->
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
			    <a class="nav-link active" href="add_bus.php">Add new bus</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="buses_table.php">Buses table</a>
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

<div class="form">
<h1>Add New Bus</h1>
<form name="add_new_bus" action="" method="post">
<input type="text" name="busno" placeholder="Bus number" required />
<input type="text" name="start_station" placeholder="Start station" required />
<input type="text" name="end_station" placeholder="End station" required />
<input type="text" name="routeno" placeholder="Route number" required />
<input type="text" name="timing" placeholder="Timing" required /><br><br>
<button type="submit" class="btn btn-primary">Add Bus</button>
<a class="btn btn-outline-primary ml-1" href="buses_table.php" role="button">View Buses Table</a><br /><br />
</form> 
</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
