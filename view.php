<?php
//step 1: start the session, check if the user is not logged in, redirect to start
if (isset($_SESSION['email'])) {
    $email=$_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/01d69d0d4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profile.css">
    <title>Document</title>
</head>
<body class="profile-body">

    <?php include("navbar.php") ?>

    <?php
    require_once('connectdb.php');


        //Getting a specific CV using ID
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM cvs WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
        } else {
            echo "Please check details and try again";
        }
    ?>

    <div class="container">
        <br><br>
        <p class="headings">Name: </p>
        <p class="user-data"><?php echo $result['name'] ?></p>

        <br>
        <p class="headings">Email: </p>
        <p class="user-data"><?php echo $result['email'] ?></p>

        <br><br><br>
        <p class="headings">Key Programming Language: </p>
        <p class="user-data"><?php echo $result['keyprogramming'] ?></p>

        <br>

        <p class="headings">Profile/Current Occupation: </p>
        <p class="user-data"><?php echo $result['profile'] ?></p>
        
        <br><br><br>
        
        <p class="headings">Education: </p>
        <p class="user-data"><?php echo $result['education'] ?></p>

        <br>

        <p class="headings">URLlinks: </p>
        <p class="user-data"><a class="url" href="<?php echo $result['URLlinks'] ?>"><?php echo $result['URLlinks'] ?></a></p>
        <br><br><br><br>

    </div>
</body>
</html>

