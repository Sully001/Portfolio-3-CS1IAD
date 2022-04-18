<?php
	session_start();
	session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php include("navbarlogout.php") ?>
<H2> Logged out now! </H2> 
 <p>Would like to log in again? <a href="login.php">Log in</a>  </p>
	
</body>
</html>
