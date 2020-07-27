<?php

include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="<script src="js/bootstrap.min.js"></script></script>
<script src="<script src="js/bootstrap.js"></script></script>
<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
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
			    <a class="nav-link active" href="manager_index.php">Home</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="add_bus.php">Add new bus</a>
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

<p class="h3">Welcome <?php echo $_SESSION['username'];?>!</p>
<p>This is secure area.</p>
<p><a href="manager_dashboard.php">Dashboard</a></p>
<a class="btn btn-danger" href="manager_logout.php" role="button">Logout</a>


</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
