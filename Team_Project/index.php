<?php

session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection();

function displayCandy() {
    global $conn;
    $sql = "SELECT * 
            FROM candy
            ORDER BY candyName ASC";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $candies = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $candies;
}


?>

<!DOCTYPE html>
<html>
  <div id="page"> 
    <head>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <style>
            @import url("css/styles.css");
    
        </style>
        
        <title> Candy Shop </title>
        
        <script>
            
            function confirmAddToCart(candyName) {
                
                return confirm("Are you sure you want to add " + candyName + " to shopping cart?");
                
            }
        </script>
        
        <meta charset="utf-8"/>
    </head>
    
    <body>
    


        <h1> Candy Shop </h1>
        
        <form style='display:inline'>
            
            <input type="submit" value="Select Type" />
            
        </form>
        
        <form style='display:inline'>
            
            <input type="submit" value="Order by Calories" />
            
        </form>
        
        <form style='display:inline'>
            
            <input type="submit" value="Order by Price" />
            
        </form>
        
        <br /><br />
        
        <p> <a href="shoppingcart.php">View Shopping Cart</a></p>

        
        <?php
        
        $candies = displayCandy();
        
        foreach($candies as $candy) {
            echo $candy['candyName'];
            echo "<a href='candyInfo.php?candyId=".$candy['candyId']."'> [info] </a> ";
            

            echo "<form action='addtocart.php' style='display:inline' onsubmit='return confirmAddToCart(\"".$candy['candyName']."\")'>
                     <input type='hidden' name='candyId' value='".$candy['candyId']."' />
                     <input type='submit' value='Add To Cart'>
                  </form>";
            
            echo "<br />";
            
        
        
        }
        ?>
        </div> 
    </body>   
    
</html>