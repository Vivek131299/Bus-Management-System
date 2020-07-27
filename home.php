<html>  
    <head>
        <title>Bus Management System</title>
        <link rel="stylesheet" href="css/style2.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>

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

        <div class="menu">
            <div class="p-3 mb-2 bg-info text-white" id="heading1">
                <h2><a class="text-white" href="home.php">BUS MANAGEMENT SYSTEM</a></h2>
                <!--<small class="text-muted">Welcome to our homepage</small>-->
            </div>
            <br>
            <div class="ml-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                    <a class="nav-link active" href="home.php">Home</a>
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
                    <a class="nav-link" href="index.php">Check Bus Availability</a>
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
            <!--<div class="rightbuttons">
                <a id="btn1" href="login.php"><input type="button" class="btn btn-primary" name="submit" value="Login" /></a>
                <a href="registration.php"><input type="button" class="btn btn-primary" name="submit" value="Register" /></a>  
            </div>-->
          
        </div>
        
        <center>
            <div class="heading3 border border-primary rounded-xlg bg-light text-dark">
                <h3 class="text-primary">OUR MOTIVE</h3>
                <p id="paragraph">The main objective of this measure is to build a common platform for integrated
                     monitoring and passenger information services. <br>By gathering relevant information 
                     from drivers and operators attitudes towards the system, the measure can improve 
                     the quality and reliability of the transport services which will lead to better 
                     acceptance and usage of these services by citizens.<br> As part of this measure a GPS 
                     traffic management system has been introduced.<br> The system has been set up to track 
                     public transport vehicles, and this information has been used to prioritise and 
                     optimise Public Transport, making it more attractive to users.
                </p>
            </div>
            <div class="heading3 border border-primary rounded-xlg bg-light text-dark">
                    <h3 class="text-primary">ABOUT US</h3>
                    <p id="paragraph">We are the students of third year from IT department of
                        PCET's Nutan Maharashtra Institute of Engineering and Technology college,
                         Talegaon, Pune.<br>
                        This is our mini project of the subject Database Management System.
                        We are the group of three students working on this project.<br>
                        We are eager to work on this project as it will highlight the need of 
                        today's fast generation by providing them information about their daily
                        transportation services like buses with the GPS system for real time tracking
                        and also information about specific bus, bus number, driver info., staff, and more.   
                    </p>
                </div>
        </center>
        
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    </body>
</html>