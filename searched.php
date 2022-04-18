<?php
//step 1: start the session, check if the user is logged in get the users email
session_start();	

include_once('connectdb.php');
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM cvs WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindparam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/01d69d0d4a.js" crossorigin="anonymous"></script>
    <title>Index Page</title>
</head>
<body>
    <?php include("navbar.php") ?>

    <button class="index"><a href="index.php">Click Here To See All CVs</a></button>

    <br>

    <br><br><br><br>

    <h2>Search Results<?php $_POST['search'] ?></h2><br>
    <table cellspacing="0"  cellpadding="5" id="myTable" class="table" >
            <tr>
              <th align='left'><b>Name</b></th>   
              <th align='left'><b>Email</b></th> 
              <th align='left'><b>Key Programming Language</b></th>
              <th><b>View</b></th>
            </tr>
<?php 
        require_once("connectdb.php");

        try {
            if(isset($_POST["submit"])) {
                $stmt = $_POST["search"];
                $sth = $db->prepare("SELECT * FROM cvs WHERE name LIKE '%$stmt%' OR keyprogramming = '$stmt'");
               
                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();

                while ($row = $sth->fetch()) {

            echo "<tr><td align='left'>" . $row->name . "</td>";
			echo "<td align='left'>" . $row->email . "</td>";
            echo "<td align='left'>" . $row->keyprogramming . "</td>";
            echo "<td align='left'><a href='view.php?id=" . $row->id . "'" . "class='btn btn-primary'>View</a></td></tr>\n";
                }
            }
        } catch (PDOException $ex) {
            echo "Couldn't search for your query";
            echo "Error details: <em>". $ex->getMessage()."</em>";
        }
    ?>
    
</body>
</html>


