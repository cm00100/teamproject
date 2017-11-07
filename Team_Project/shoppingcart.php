<?php

session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection();



?>

<!DOCTYPE html>
<html>
    <div id="checkPage">
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="css/style.css" media="all" rel="stylesheet" type="text/css"/>

        <title> Shopping Cart </title>
        
        
    </head>
    
    <body>

        <h1> Candy Shop </h1>
        
          <form action="index.php">
            
            <input type="submit" value="Back" />
            
        </form>
        
        <br /><br />
        
        <?php
        
        
 

     
        

      echo "<div id='cartBox'>";

        
        
       echo "Current item(s) in cart: .<br>";
        
   
         
           $displaycart = $_SESSION['cart'];
       
    
           for($i = 0 ; $i < count($displaycart) ; $i++) 
           {
                echo $displaycart[$i] . " ";
                echo '<br></br>';
           }
 
    

            echo" <form method='POST' action=''>
                <input type='submit' name='button'  value='Clear Shopping Cart'>
                </form>";
           if (isset($_POST['button'])) 
            { 
               session_destroy(); 
            } 
            
          echo "</div>";


        
     //session_destroy();
 


        
        ?>
    </body>     
</html>