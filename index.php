<?php
//step 1: start the session, check if the user is not logged in, redirect to start
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
    <link rel="stylesheet" href="profile.css">
    <script src="https://kit.fontawesome.com/01d69d0d4a.js" crossorigin="anonymous"></script>
    

    <title>Index Page</title>
</head>
<body>
    <?php
        include("navbar.php");
        if(isset($_SESSION['email'])){
            echo "<h2 class='welcome'>Account signed in: " .  $result['name'] . "</h2>";
        }
    ?>

    <br><br><br><br>
    <h2>List of All CVS</h2><br>

    <?php
        try {
            $query="SELECT  * FROM  cvs ";
            //run  the query
            $rows =  $db->query($query);
            
        //step 3: display the course list in a table 	
            if ( $rows && $rows->rowCount()> 0) {
            
            ?>	
        <table cellspacing="0"  cellpadding="5" id="myTable" class="table" >
          <tr>
              <th align='left'><b>Name</b></th>   
              <th align='left'><b>Email</b></th> 
              <th align='left'><b>Key Programming Language</b></th>
              <th><b>View</b></th>
        </tr>
            <?php
            // Fetch and  print all  the records.
                while  ($row =  $rows->fetch())	{
                    echo  "<tr><td align='left'>" . $row['name'] . "</td>";
				    echo  "<td align='left'>" . $row['email'] . "</td>";
                    echo  "<td align='left'>" . $row['keyprogramming'] . "</td>";
                    echo "<td align='left'><a href='view.php?id=" . $row['id'] . "'" . "class='btn btn-primary'>View</a></td></tr>\n";
                }
                echo  '</table>';
            }
            else {
                echo  "<p>No  course in the list.</p>\n"; //no match found
            }
        }
        catch (PDOexception $ex){
            echo "Sorry, a database error occurred! <br>";
            echo "Error details: <em>". $ex->getMessage()."</em>";
        }
    ?>

    <br>
</body>
</html>

