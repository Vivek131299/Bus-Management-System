<?php include('reset_logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="form">
	<form action="enter_email.php" method="post">
		<h2 class="form">Reset password</h2>
		<!-- form validation messages -->
		<?php include('messages.php'); ?>
		<div class="form">
			<label>Your email address</label>
			<input type="email" name="email">
		</div>
		<div class="form">
			<button type="submit" name="reset-password" class="login-btn">Submit</button>
		</div>
	</div>
	</form>
</body>
</html>