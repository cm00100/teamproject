<?php

session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection();



?>

<!DOCTYPE html>
<html>
    <div id="checkoutPage">
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <title> Shopping Cart </title>
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
        
        
 

     
        
        
        
       echo "Current item(s) in cart: .<br>";
        
   
         echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
      
        
     //session_destroy();
 


        
        ?>
    </body>     
</html>