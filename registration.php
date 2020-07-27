<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="<script src="js/bootstrap.min.js"></script></script>
<script src="<script src="js/bootstrap.js"></script></script>
<script src="js/jquery-3.4.1.min.js"></script>
 
 <style>
    .dropbtn {
  background-color: grey;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  border-radius: 6px;
}
    .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 10px 14px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
        </style>

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
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";

    	}
    }else{

?>

<div class="menu">
            <div class="p-3 mb-2 bg-info text-white" id="heading1">
                <h2><a class="text-white" href="home.php">BUS MANAGEMENT SYSTEM</a></h2>
                <!--<small class="text-muted">Welcome to our homepage</small>-->
            </div>
			<br>
			<div class="ml-3">
				<ul class="nav nav-tabs">
					<li class="nav-item">
					<a class="nav-link" href="home.php">Home</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
					<a class="nav-link active" href="registration.php">Register</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact Us</a>
					</li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">Check Bus Availability</a>
                    </li>
                    <div class="navbar-nav ml-auto mr-3">
                    <div class="dropdown mr-2" style="float:right";>
                      <button class="btn btn-secondary dropdown-toggle           ">Manager</button>
                      <div class="dropdown-content mr-2">
                        <a href="manager_login.php">Login</a>
                        <a href="manager_reg.php">Registration</a>
                        
                      </div>
                    </div>
                </div>
				</ul>
				<br>
			</div>
	</div>

<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required /><br><br>
<button type="submit" class="btn btn-primary">Register</button>
</form>
<br />
Already have an account? <br>
<a href="login.php">Sign in</a> <br /><br />

</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
