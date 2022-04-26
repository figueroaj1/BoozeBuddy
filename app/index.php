<!-- Name: Jose & Dietrich
     Description: BoozeBuddy
 -->
<!DOCTYPE html>
<html lang="en">
    <body>
        <header>
            <title>Booze Buddy</title>
            <meta charset="UTF-8">
        </header>    
        <main>
            <?php
                //Connect to database          
                $host = "localhost";
                $port = "81";
                $socket = "3307";
                $user = "root";
                $password = "";
                $dbname = "BoozeBuddy";
                
                //test connection
                try {
                    $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
                    echo 'here is something';
                    $conn = new mysqli($host, $user, $password, $dbname);
            
                } catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }
                //change these to reflect actual data
                $sqlquery = "INSERT INTO Alcohol VALUES ( 105, 'Miller Lite2', 4, 'Lite Lager YEET', 'America Y NOT')";
                echo 'before if statement';
                if ($conn->query($sqlquery) === TRUE) {
                    echo "record inserted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>
        
            <h2> Please enter information </h2>
            <form>
                <label for="storeID"> Store ID: </label>
                <br>
                <input type="text" id="storeID">
                <br><br>
                <label for="price"> Price: </label>
                <br>
                <input type="text" id="price">
                <br><br>
                <label for="alcoholID"> Alcohol ID: </label>
                <br>
                <input type="text" id="alcoholID">
                <br><br>
                <label for="date"> Date Observed: </label>
                <br>
                <input type="text" id="date">
                <br><br>
                <input type="submit" value="submit">
            </form>
            <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                    // collect value of input field
                    $storeID = $_REQUEST['storeID'];
                    $price = $_REQUEST['price'];
                    $alcoholID = $_REQUEST['alcoholID'];
                    $date = $_REQUEST['date'];
                
                    if (empty($alcoholID) || empty($storeID) || empty($price)) {
                        echo "data is empty";
                    } else {
                        echo $storeID;
                        echo $price;
                        echo $alcoholID;
                        echo $date;
                    }
                }

                // Closing the connection.
                $conn->close();

            ?>
        </main>
    </body>
</html>