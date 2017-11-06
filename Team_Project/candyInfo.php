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

function getCandyNames()
{
    global $conn;
    
    $sql= "SELECT brandName FROM `candy` c
            JOIN brand b
            WHERE c.brandId=b.brandId";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $bName = $statement->fetch(PDO::FETCH_ASSOC);
    
      return $bName;
    
    
}

function getAllergyName()
{
    global $conn;
    
    $sql= "SELECT allergyDesc FROM `candy` c
            JOIN allergies a
            WHERE c.allergyId=a.allergyId
            AND c.allergyId IS NOT NULL";
            
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $bName = $statement->fetch(PDO::FETCH_ASSOC);
    
    foreach($bName as $idk)
    {
        return ucfirst($idk);
    }
}

?>

<!DOCTYPE html>
<html>
    <div id="infoPage">
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <title> Candy Info </title>
        <style>
            @import url("css/styles.css");
    
        </style>
        
    </head>
    
    <body>

        <h1> Candy Shop </h1>
        
          <form action="index.php">
            
            <input type="submit" value="Back" />
            
        </form>
        
        <br /><br />
        
        <?php
        
        $candy = displayCandy();
        $bName = getCandyNames();
        
        echo "Candy Information:";
        echo "<br />";
        echo "Id: " . ucfirst($candy['candyId']);
        echo "<br />";
        echo "Name: " . ucfirst($candy['candyName']);
        echo "<br />";
        echo "Type: " . ucfirst($candy['candyType']);
        echo "<br />";
        echo "Brand: " . $candy['brandName'];
        echo "<br />";
        echo "Allergies: " . getAllergyName();
        echo "<br />";
        
        ?>
        </div>
    </body>     
</html>