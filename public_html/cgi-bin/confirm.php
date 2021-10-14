<?php
$servername = "localhost";
$username = "id16136502_admin";
$password = 'Tv4xU$R?hV?U^OKl';
$database = "id16136502_netflixpayment";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }
$dbh->exec("USE id16136502_netflixpayment");

$evtid = $_GET['id'];
$evtstatus = 'sudah bayar'; 

$sql = 'Update daftarbayar set status_bayar=:evtstatus WHERE id=:evtid';
$prepare = $dbh->prepare($sql);
$prepare->bindValue(':evtid',$evtid, PDO::PARAM_INT);
$prepare->bindValue(':evtstatus',$evtstatus, PDO::PARAM_STR);
$prepare->execute();

$dbh = NULL;

header('Location: ../index.php');

exit();
?>