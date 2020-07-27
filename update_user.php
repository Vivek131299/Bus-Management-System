<?php
$id = $_GET['id'];
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update User Information</title>
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="<script src="js/bootstrap.min.js"></script></script>
<script src="<script src="js/bootstrap.js"></script></script>
<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
<?php
if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

        $query = "UPDATE users SET username='$username', email='$email', password='".md5($password)."' WHERE id=$id";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<div class='form'><h3>Information updated successfully.</h3><br/>Click here to <a href='users_table.php'>View users table</a></div>";

    	}
    }else{

?>

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
	</div>

<div class="form">
<h2>Update information for <?php $res = mysqli_query($con,"SELECT * FROM users where id=$id");
							$row = mysqli_fetch_array($res);
							echo $row['username']; ?>
</h2>
<form name="update_user" action="" method="post">
<input type="text" name="username" placeholder="New username" required />
<small class="form-text text-muted">Previous: <?php echo $row['username']; ?></small>
<input type="email" name="email" placeholder="New email" required />
<small class="form-text text-muted">Previous: <?php echo $row['email']; ?></small>
<input type="password" name="password" placeholder="New password" required /><br><br>
<button type="submit" class="btn btn-primary">Update</button>
<a class="btn btn-outline-danger ml-2" href="users_table.php" role="button">Cancel</a>
</form>
<br />

</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
