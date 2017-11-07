<?php

session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection();

function displayCandy() {
    global $conn;
    $sql = "SELECT * 
            FROM candy
            WHERE candyId = " . $_GET['candyId'] ; 
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $candy = $statement->fetch(PDO::FETCH_ASSOC);
    return $candy;
}



/*

function getCandyNames()
{
    global $conn;
    
    $sql= "SELECT brandName FROM `candy` c 
    JOIN brand b
    WHERE c.brandId=b.brandId";
    //AND c.brandId = " . $_GET['brandId'];
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dName = $statement->fetch(PDO::FETCH_ASSOC);
    
    foreach($dName as $so)
    {
     return $so;
    }
       
    
      //return $bName;
    
    
}*/

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
    
    <body background="newBack.jpg">
<div id="wholePage">
        <h1> Candy Shop </h1>
        
         
        
        <br /><br />
      
        <?php
       
        //echo "<div id='wholePage'>";
       
        $candy = displayCandy();
       // $dName = getCandyNames();
        
        echo "Candy Information";
        echo "<br />";
        echo "Name: " . ucfirst($candy['candyName']);
        echo "<br />";
        echo "Calories: " . ucfirst($candy['caloriesId']);
        echo "<br />";
        echo "Type: " . ucfirst($candy['candyType']);
        echo "<br />";
        echo "Brand: " ;
        // This is where Brand Name of Candy is located.
        
        $bName = $candy['brandId'];
        $sql = "SELECT brandName FROM brand WHERE brandId = '$bName'";
        $stmt = $conn->query($sql);	
        $brandResults = $stmt->fetchAll();
        foreach ($brandResults as $brand) 
        {
<<<<<<< HEAD
        	echo ucfirst($brand['brandName'])   . "<br />";
        }	 
=======
        	echo $brand['brandName']   . "<br />";
        }
        
        

>>>>>>> 07c5ad9d4d4337b2ce5e3cbb78caeac7368e658d
        
        //echo "Brand: " . $dName;
       // echo "<br />";
        
        echo "Allergies: ";
        $aName = $candy['allergyId'];
        $sql = "SELECT allergyDesc FROM allergies WHERE allergyId = '$aName'";
        $stmt = $conn->query($sql);	
        $allergyName = $stmt->fetchAll();
        foreach ($allergyName as $allergies) 
        {
        	echo ucfirst($allergies['allergyDesc'])   . "<br />";
        } 
        
    //  echo "</div>";
        
        
        
       // echo "Allergies: " . getAllergyName();
       // echo "<br />";
        
        
        
        ?>
        </br>
      <form action="index.php">
            
            <input type="submit" value="Back" />
            
        </form>
        </div>
        </div>    
        </div>
        
         
    </body>     
</html>