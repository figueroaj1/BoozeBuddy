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
        <br>
            <a href="index.php">Home</a>


            <h2> Please enter information </h2>
            <form method="get">
                <label> Beer Name: </label> <br>
                <input type="text" name="DrinkName" id="DrinkName">
                    <br><br>
                <label> Store Name: </label> <br>
                <input type="text" name="StoreName" id="StoreName">
                    <br><br>
                <label> Price: </label> <br>
                <input type="text" name="Price" id="Price">
                    <br><br>
                <label> Country of Origin </label> <br>
                <input type="text" name="COI" id="COI">
                    <br><br>
                <input type="submit" value="submit">
            </form>
            <br>

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
                    echo 'Connection Succesful';
                    echo "<br>";
                    $conn = new mysqli($host, $user, $password, $dbname);
                } catch (PDOException $e) {
                    echo 'Connection Failed: ' . $e->getMessage();
                }

                // Inserting the data for Alcohol Table
                if(isset($_GET['DrinkName'])) 
                {

                    $sql = 'INSERT INTO Alcohol '.
                    '(DrinkName, COI) '.
                    'VALUES (?, ?);';
                    $statement = $dbh->prepare($sql);
                    $statement->bindValue(1, $_GET['DrinkName']);
                    $statement->bindValue(2, $_GET['COI']);


                    try{
                        $ret = $statement->execute();
                    }catch(Exception $e){
                        echo "Insert error: ", $e->getMessage();
                    }
                    echo "<br>";
                }

                if(isset($_GET['StoreName'])) 
                {

                    $sql = 'INSERT INTO Store '.
                    '(StoreName) '.
                    'VALUES (?);';
                    $statement = $dbh->prepare($sql);
                    $statement->bindValue(1, $_GET['StoreName']);


                    try{
                        $ret = $statement->execute();
                    }catch(Exception $e){
                        echo "Insert error: ", $e->getMessage();
                    }
                    echo "<br>";
                }

                if(isset($_GET['Price'])) 
                {

                    
                    $sql = 'INSERT INTO Store_Bev '.
                    '(Price) '.
                    'VALUES (?);';
                    $statement = $dbh->prepare($sql);
                    $statement->bindValue(1, $_GET['Price']);

                    try{
                        $ret = $statement->execute();
                    }catch(Exception $e){
                        echo "Insert error: ", $e->getMessage();
                    }
                    echo "<h1>insert happened!</h1>";
                }



            ?>
       
        </main>
    </body>
</html>