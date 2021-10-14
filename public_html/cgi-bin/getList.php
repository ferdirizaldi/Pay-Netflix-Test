<?php
    function getList() {
$servername = "localhost";
$username = "id16136502_admin";
$password = 'Tv4xU$R?hV?U^OKl';
$database = "id16136502_netflixpayment";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }
        $dbh->exec("USE id16136502_netflixpayment");
        $sql = 'SELECT * FROM daftarbayar ORDER BY nama DESC';
        $prepare = $dbh->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['lempar'] = $result;
        $dbh = Null;
    }
?>