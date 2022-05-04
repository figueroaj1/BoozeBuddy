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
                    echo 'here is something';
                    $conn = new mysqli($host, $user, $password, $dbname);
                } catch (PDOException $e) {
                    echo 'Connection Failed: ' . $e->getMessage();
                }
            ?> 
            <h2> Please enter information </h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label for="storeID"> Store ID: </label>
                <br>
                <input type="text" id="StoreID">
                <br><br>
                <label for="price"> Price: </label>
                <br>
                <input type="text" id="Price">
                <br><br>
                <label for="alcoholID"> Alcohol ID: </label>
                <br>
                <input type="text" id="AlcID">
                <br><br>
                <label for="date"> Date Observed: </label>
                <br>
                <input type="submit" value="submit">
            </form>

            <?php
                // collect value of input field
                $StoreID = $_REQUEST['StoreID'];
                $Price = $_REQUEST['Price'];
                $AlcID = $_REQUEST['AlcID'];

                $EnterStoreID = $_POST['StoreID'];
                $EnterPrice = $_POST['Price'];
                $EnterAlcID = $_POST['AlcID'];

                $sql = "INSERT INTO Store_Bev (StoreID) VALUES ('$EnterStoreID')"; 
                // $result = $dbh->
                if (empty($AlcID) || empty($StoreID) || empty($Price)) {
                    echo "data is empty<br>";
                } else {
                    if($conn->query($sql) ===TRUE) {
                        echo "Records entered succesfully";
                    } else {
                        echo "ERROR: " . $sql . "<br>" . $conn->error;
                    }
                }
            ?>
   
            <?php
               
                $sql = "SELECT storeID, price, alcID FROM Store_Bev";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>" . htmlspecialchars($row["storeID"]) . "</td><td>" . $row["price"]. " " . $row["alcID"]. "<br>";
                  }
                } else {
                  echo "0 results";
                }

            ?>
       
        </main>
    </body>
</html>