<!-- Name: Jose & Dietrich
     Description: BoozeBuddy
 -->
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="styles.css"> 
    <body>
        <header>
            <title>Booze Buddy</title>
            <meta charset="UTF-8">
            <h1>Booze Buddy</h1>
        </header>    
        <main>
            <?php
                //Connect to database          
                $host = "localhost";
                $port = 3307;
                $socket = "";
                $user = "root";
                $password = "";
                $dbname = "boozebuddy";
                
                //test connection
                try {
                    $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
                    echo 'SQL CONNECTED';
                    $conn = new mysqli($host, $user, $password, $dbname);
                } 
                catch (PDOException $e) {
                    echo 'Connection Failed: ' . $e->getMessage();
                }
            ?>
            <h2>Beer Menu</h2>

            <?php
                //Printing Alcohol and prices for menu
                $select = "SELECT * FROM Alcohol INNER JOIN Store_Bev ON Alcohol.AlcID = Store_Bev.AlcID ;";
                $result = $dbh->query($select);
                echo "<table>";
                echo "<tr><td>". "Drink Name | ". "</td><td>". "Price | ". "</td><td>". "Origin". "</td>" ;
                while($row = $result->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr><td>" . htmlspecialchars($row['DrinkName']) . "</td><td>" .  "$".htmlspecialchars($row['Price']) . "</td><td>" . htmlspecialchars($row['COI']) . "</td></tr>";
                }
                echo "</table>";
            ?>

            <a href="add.php">Add a Beer</a>
        </main>
    </body>
</html>