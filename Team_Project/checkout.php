<?php

session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection();



?>

<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <title> Checkout </title>
        
    </head>
    
    <body>

        <h1> Candy Shop </h1>
        
        <h2>Checkout</h2>

        
          <form action="index.php">
            
            <input type="submit" value="Back" />
            
        </form>
        
        <br /><br />
        
        
      
        
    
    </body>     
</html>