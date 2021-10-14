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
    $evtnama = $_POST['nama'];
    $evtstatus = 'belum dikonfirmasi'; 
    $sql = 'INSERT INTO daftarbayar (nama, status_bayar) VALUE (:nama, :evtstatus)';
    $prepare = $dbh->prepare($sql);
    $prepare->bindValue(':nama',$evtnama, PDO::PARAM_STR);
    $prepare->bindValue(':evtstatus', $evtstatus, PDO::PARAM_STR);
    $prepare->execute();
    $dbh = NULL;
    header('Location: ../index.php');
    exit();
?>