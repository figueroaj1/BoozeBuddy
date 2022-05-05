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
            <a href="index.php">Home</a>

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

            <?php
                if(isset($_GET["submit_address"])){
                    $address = $_GET["Store"];
                    ?>

                    <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                    
                    <?php
                }

            ?>

            <form method="GET">
                <p>

                    <select name="Store">
                        <?php

                            $sql = 'SELECT DISTINCT * from Store;';
                            $statement = $dbh->query($sql);
                            $StoreNames = array();
                            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                            $StoreNames[$row['StoreID']] = $row['StoreName'];
                            //echo '    <option value="' . $row['id'] . '">' . $row['name'] . '</option><br>\n';
                            }
                        
                            foreach($StoreNames as $StoreID){
                            echo '    <option value="' . $StoreID . '">' . $StoreID . '</option><br>';
                            echo "\n";
                            }   
                        ?>
                    </select>
                             
                    <br>
                </p>
                <input type="submit" name="submit_address">
            </form>

        </main>
    </body>
</html>

