<?php
$servername = "localhost";
$username = "id16136502_admin";
$password = 'Tv4xU$R?hV?U^OKl';
$database = "id16136502_netflixpayment";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }

$dbh->exec("CREATE TABLE daftarbayar (id int primary key auto_increment,nama varchar(30),status_bayar varchar(30))");

$dbh = Null;
