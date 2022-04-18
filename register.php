<?php
  include('connectdb.php');

  if(isset($_POST['submitted'])) {
      if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO cvs (name, email, password)
        VALUES (:name, :email, :password)";

        $stmt = $db->prepare($sql);
        $stmt->execute(['name' => $username, 'email' => $email, 'password' => $password]);
        echo "Congratulations you are now registered";
        }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Registration System </title>
</head>
<body>
  <?php include("navbar.php") ?>
  
  <h2>Register</h2>
  <form method = "post" action="register.php">
  
  <label for="Username">Username</label>
	<input type="text" name="username" id="username" required><br><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>
	
  <label for="password">Password</label>
  <input type="password" name="password" id="password" required><br><br>



	<input type="submit" value="Register" /> 
	<input type="reset" value="clear"/>
	<input type="hidden" name="submitted" value="true"/>
  </form>  
  <p> Already a user? <a href="login.php">Log in</a>  </p>

</body>
</html>