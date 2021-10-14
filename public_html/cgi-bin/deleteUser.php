<?php
$servername = "localhost";
$username = "id16136502_admin";
$password = 'Tv4xU$R?hV?U^OKl';
$database = "id16136502_netflixpayment";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }
$dbh->exec("USE id16136502_netflixpayment");

$evtid = $_GET['id'];

$sql = 'DELETE FROM daftarbayar WHERE id=:evtid';
$prepare = $dbh->prepare($sql);
$prepare->bindValue(':evtid',$evtid, PDO::PARAM_INT);
$prepare->execute();

$dbh = NULL;

header('Location: ../index.php');

exit();
?>