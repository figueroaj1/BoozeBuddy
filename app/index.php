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
                $user = "admin";
                $password = "PAehcD0Za9fW";
                $dbname = "boozebuddy";
                
                //test connection
                try {
                    $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
                    echo 'here is something';
                    $conn = new mysqli($host, $user, $password, $dbname);
                }
            ?>
    <?php
        //Connect to database          
        $host = "localhost";
            $port = 3306;
            $socket = "";
            $user = "root";
            $password = "";
            $dbname = "BoozeBuddy";
            
            //test connection
            try {
                $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
          //change these to reflect actual data
        $sqlquery = "INSERT INTO Alcohol VALUES ('Miller Lite2', 4, 'Lite Lager YEET', 'America Y NOT')";
          
        if ($conn->query($sql) === TRUE) {
            echo "record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    ?> 
    <main>
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

                } catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }
                //change these to reflect actual data
                // $sqlquery = "INSERT INTO Alcohol VALUES ( 10, 'Miller Lite2', 4, 'Lite Lager YEET', 'America Y NOT')";
                // echo 'before if statement';
                // if ($conn->query($sqlquery) === TRUE) {
                //     echo "record inserted successfully";
                // } else {
                //     echo "Error: " . $sql . "<br>" . $conn->error;
                // }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            ?>
        
            <h2> Please enter information </h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label for="storeID"> Store ID: </label>
                <br>
                <input type="text" id="storeID">
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
                <input type="text" id="date">
                <br><br>
                <input type="submit" value="submit">
            </form>

            <?php
                    // collect value of input field
                    $StoreID = $_REQUEST['StoreID'];
                    $Price = $_REQUEST['Price'];
                    $AlcID = $_REQUEST['alcID'];

                    $EnterStoreID = $_POST['$StoreID']
                    $EnterPrice = $_POST['$Price']
                    $EnterAlcID = $_POST['$AlcID']

                    $sql = "INSERT INTO Store_Bev (StoreID) VALUES ('$EnterStoreID')"; 
                
                    if (empty($AlcID) || empty($StoreID) || empty($Price)) {
                        echo "data is empty<br>";
                    } else {
                        if($conn->query($sql) ===TRUE) {
                            echo "Records entered succesfully";
                        } else {
                            echo "ERROR: " . $sql . "<br>" . $conn->error;
                        }
                    }
                

                // Closing the connection.
                $conn->close();

            ?>
   
            <?php
               
                $sql = "SELECT storeID, price, alcID FROM Store_Bev";
                $conn = new mysqli($host, $user, $password, $dbname);
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["storeID"]. " - Name: " . $row["price"]. " " . $row["alcID"]. "<br>";
                  }
                } else {
                  echo "0 results";
                }
            ?>
       
        </main>
    </body>
</html>