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
        <title>Admin Page </title>
    </head>
    <body>

        <h1> Candy Info </h1>
        
          <form action="index.php">
            
            <input type="submit" value="Back" />
            
        </form>
        
        
        <br /><br />
        
        <?php
        
        $candy =displayCandy();
            
        echo $candy['candyId'];
        echo "<br />";
        echo $candy['candyName'];
        echo "<br />";
        echo $candy['candyType'];
        echo "<br />";
        echo $candy['brandId'];
        echo "<br />";
        echo $candy['allergyId'];
        echo "<br />";
        
        ?>
        
    </body>     
</html>