<?php
//if the form has been submitted
if (isset($_POST['submitted'])){
    if ( !isset($_POST['email'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
     exit('Please fill both the username and password fields!');
    }
    // connect DB
    require_once ("connectdb.php");
    try {
    //Query DB to find the matching username/password
    //using prepare/bindparameter to prevent SQL injection.
        $stat = $db->prepare('SELECT password FROM cvs WHERE email = ?');
        $stat->execute(array($_POST['email']));
        
        // fetch the result row and check 
        if ($stat->rowCount()>0){  // matching username
            $row=$stat->fetch();

            if (password_verify($_POST['password'], $row['password'])){ //matching password
                
                //??recording the user session variable and go to loggedin page?? 
              session_start();
                $_SESSION["email"]=$_POST['email'];
                header("Location:index.php");
                exit();
            
            } else {
             echo "<p style='color:red'>Error logging in, password does not match </p>";
             }
        } else {
         //else display an error
          echo "<p style='color:red'>Error logging in, Email not found </p>";
        }
    }
    catch(PDOException $ex) {
        echo("Failed to connect to the database.<br>");
        echo($ex->getMessage());
        exit;
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

    <?php include("navbar.php");?>
    <div class="form-container">
    <form action="login.php" method="post" class="form">
    <h2>Welcome to AstonCV Database Website</h2><br>
   
    <label for="email">Email: </label>
    <input type="email" id="email" name="email" required>

    <br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <br><br>

    <input type="submit" value="Login" />
	<input type="reset" value="Clear"/>
    <input type="hidden" name="submitted" value="TRUE" />

    <br><br>

    <p>Don't have an account yet?  <a href="register.php">Register</a> </p>
	
    </form>
</div>
</body>
</html>


