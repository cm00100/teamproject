<?php

session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection();

function displayCandy() {
    global $conn;
    $sql = "SELECT * 
            FROM candy
            WHERE candyId = " . $_GET['candyId'];
    $statement = $conn->prepare($sql);
    $statement->execute();
    $candy = $statement->fetch(PDO::FETCH_ASSOC);
    return $candy;
}

?>

<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <title> Candy Info </title>
        
    </head>
    
    <body>

        <h1> Candy Shop </h1>
        
          <form action="index.php">
            
            <input type="submit" value="Back" />
            
        </form>
        
        <br /><br />
        
        <?php
        
        $candy = displayCandy();
            
        echo "Candy Information:";
        echo "<br />";
        echo "Id: " . $candy['candyId'];
        echo "<br />";
        echo "Name: " . $candy['candyName'];
        echo "<br />";
        echo "Type: " . $candy['candyType'];
        echo "<br />";
        echo "Brand: " . $candy['brandId'];
        echo "<br />";
        echo "Allergies: " . $candy['allergyId'];
        echo "<br />";
        
        ?>
        
    </body>     
</html>