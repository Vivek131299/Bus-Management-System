<?php


include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style2.css">
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

<!--	<style type="text/css">
	body {
    position: relative;
    background: #ffffff;
    overflow: hidden;
}
body:before {
    content: ' ';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0.2;
    filter:brightness(70%);
    background-image: url('images/bus2.png');
    background-repeat: no-repeat;
    background-position: 50% 0;
    -ms-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover;
}
	</style> --> 
<?php
require('db.php');
if (isset($_REQUEST['start_station']))
{
	$start_station = stripslashes($_REQUEST['start_station']); 
	$start_station = mysqli_real_escape_string($con,$start_station);
	$end_station = stripslashes($_REQUEST['end_station']);
	$end_station = mysqli_real_escape_string($con,$end_station);

	$query = "SELECT * FROM `buses` WHERE start_station='$start_station' and end_station='$end_station'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
if($rows>=1){
	echo "<table class='table table-hover ml-3 mr-3'>
	<caption>Buses table</caption>
	<tr>
	<th>Bus No.</th>
	<th>Start station</th>
	<th>End station</th>
	<th>Route no.</th>
	<th>Timing</th>
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
  $status =  $row['status'];
if ($status == 'On time') {
  echo "<td class='text-success font-weight-bold'>" . $status . "</td>";
} else {
  echo "<td class='text-danger font-weight-bold'>" . $status . "</td>";
}
	echo "</tr>";
	}
	echo "</table>";
	echo "<a href='javascript:history.go(-1)'><button type='button' class='btn btn-outline-primary ml-3'>Back</button></a>";

}else{echo '<div class="alert alert-danger" role="alert">
			No buses are available on this route.  <a href="index.php">Check another</a>
			</div>';}
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
					<a class="nav-link" href="registration.php">Register</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact Us</a>
					</li>
					<li class="nav-item">
                    <a class="nav-link active" href="index.php">Check Bus Availability</a>
                    </li>
                    <div class="navbar-nav ml-auto mr-3">
                    <div class="dropdown mr-2" style="float:right";>
                      <button class="btn btn-secondary dropdown-toggle">Manager</button>
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
<?php echo '<div class="alert alert-success alert-dismissible" role="alert">
  You are successfully logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span
  </button>
</div>' ?>

<p>Welcome <?php echo $_SESSION['username'];?>!</p>
</div>

<div class="form">
<form>
<div class="form-group">
  <div class="row">
    <div class="col-auto">
      <div class="form">
    <label for="exampleFormControlSelect1"><b> Select Start station :</b></label>  
 <select name="start_station" class="form-control" id="exampleFormControlSelect1"> 
        <option value=""> Select start station </option> 
      <?php
          $qu="Select distinct start_station from buses";
          $res = mysqli_query($con,$qu) or die(mysql_error());
          while($r=mysqli_fetch_row($res))
          { 
                echo "<option value='$r[0]'> $r[0] </option>";
          }
      ?>
 </select>
  </div>
    </div>
    <div class="col-auto">
     <div class="form"><br>
    <label for="exampleFormControlSelect1"><b> Select End station :</b></label>
    <select name="end_station" class="form-control" id="exampleFormControlSelect1">
      <option value=""> Select end station </option> 
      <?php
          $qu="Select distinct end_station from buses";
          $res = mysqli_query($con,$qu) or die(mysql_error());
          while($r=mysqli_fetch_row($res))
          { 
                echo "<option value='$r[0]'> $r[0] </option>";
          }
      ?>
    </select>
  </div>
    </div>
  </div> <button type="submit" class="btn btn-primary mt-4">Check</button>
  </div>
</form>
</div> 

<center>
<div class="mt-5">
<a class="btn btn-danger" href="logout.php" role="button">Logout</a></div>
</center>
<?php } 
 
if (isset($_POST['show_cancelled'])) {
  $query = "SELECT * FROM `buses` WHERE status='Cancelled'";
  $result = mysqli_query($con,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
if($rows>=1){
  echo "<table class='table table-hover ml-3 mr-3'>
  <caption>Cancelled Buses table</caption>
  <tr>
  <th>Bus No.</th>
  <th>Start station</th>
  <th>End station</th>
  <th>Route no.</th>
  <th>Timing</th>
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
  $status =  $row['status'];
if ($status == 'On time') {
  echo "<td class='text-success font-weight-bold'>" . $status . "</td>";
} else {
  echo "<td class='text-danger font-weight-bold'>" . $status . "</td>";
}
  echo "</tr>";
  }
  echo "</table>";
  echo "<a href='javascript:history.go(-1)'><button type='button' class='btn btn-outline-primary ml-3'>Back</button></a>";
}
} else {
  ?>
<form method="post">
  <button type="submit" name="show_cancelled" id="show_cancelled" class="btn btn-outline-danger mt-4 ml-2">Show Cancelled Buses</button>
  </form>
<?php } ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
