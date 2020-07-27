<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Manager Registration</title>
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="<script src="js/bootstrap.min.js"></script></script>
<script src="<script src="js/bootstrap.js"></script></script>
<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
<?php
	date_default_timezone_set('Asia/Kolkata');
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$branch = stripslashes($_REQUEST['branch']); // removes backslashes
		$branch = mysqli_real_escape_string($con,$branch);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `managers` (username, password, email, branch, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$branch', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='manager_login.php'>Login</a></div>";
        }
    }else{
?>

<div class="menu">
            <div class="p-3 mb-2 bg-info text-white" id="heading1">
                <h2><a class="text-white" href="home.php">BUS MANAGEMENT SYSTEM</a></h2>
                <!--<small class="text-muted">Welcome to our homepage</small>-->
            </div>
			<br>
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

<div class="form">
<h1>Manager Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="text" name="branch" placeholder="Branch name" required />
<input type="password" name="password" placeholder="Password" required /><br><br>
<button type="submit" class="btn btn-primary">Register as Manager</button>
<a class="btn btn-outline-danger ml-2" href="home.php" role="button">Cancel</a>
</form>
<br>
Already have an account? <br>
<a href="manager_login.php">Sign in</a> <br>
<a class="btn btn-outline-primary mt-2" href="home.php" role="button">Home</a><br />

</div>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
