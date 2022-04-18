<?php
//step 1: start the session, check if the user is not logged in, redirect to start
session_start();	

if (!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}
$email=$_SESSION['email'];

include('connectdb.php');
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM cvs WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindparam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch();
} 

include('connectdb.php');
if(isset($_POST['submitted'])) {
  $username = $_POST['username'];
  $newemail = $_POST['email'];
  $keyprogramming = $_POST['keyprogramming'];
  $profile = $_POST['profile'];
  $education = $_POST['education'];
  $links = $_POST['URLlinks'];

  $sql = "UPDATE cvs SET name=:name, email=:newemail,
   keyprogramming=:keyprogramming, profile=:profile, education=:education, URLlinks=:URLlinks WHERE email=:oldemail";
  $stmt = $db->prepare($sql);
  $sth = $stmt->execute(array(":name"=>$username, ":newemail"=>$newemail, ":keyprogramming"=>$keyprogramming, 
  ":profile"=>$profile, ":education"=>$education, ":URLlinks"=>$links, ":oldemail"=>$email));

  if($sth) {
    echo "Successfully Updated";
    $_SESSION['email'] = $newemail;
    header("Location:index.php");
  } else {
    echo "Please try again";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Update</title>
</head>
<body>
  <h2>Update Your CV</h2>
  <form method = "post" action="update.php">
  
  <label for="Username">Username: </label>
	<input type="text" name="username" id="username" value="<?php echo $result['name'] ?>"><br><br>

  <label for="email">Email: </label>
  <input type="email" id="email" name="email" value="<?php echo $result['email']?>"><br><br>

  <label for="keyprogramming">Key Programming Language: </label>
    <input type="text" name="keyprogramming" value="<?php echo $result['keyprogramming']?>"><br><br>

    <label for="profile">Profile: </label>
    <input type="text" name="profile" value="<?php echo $result['profile']?>"><br><br>

    <label for="education">Education: </label>
    <input type="text" name="education" value="<?php echo $result['education']?>"><br><br>

    <label for="url">URLlinks (Please type in the full web address): </label>
    <input type="url" name="URLlinks" value="<?php echo $result['URLlinks']?>"><br><br>

	<input type="submit" value="Update"> 
  <input type="submit" value="Cancel">
	<input type="hidden" name="submitted" value="true"/>
  </form>  
</body>
</html>