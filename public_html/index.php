<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>PayNetflix</title>
    <link rel="stylesheet" href="./style.css">
    <script src="main.js"></script>
</head>
<body>
    <header>
        <nav>
            <a href="#">Home</a>
                <?php
                    if(!isset($_SESSION['admin'])){
                        print('<a href="./login.html">Login</a>');
                    }
                    else{
                        print('<a href="./cgi-bin/logoutAdmin.php">Logout</a>');
                    }
                ?>
            
        </nav>
    </header>
    <div class="logo">
        <h2>FLAT OUT</h2>
    </div>
    <div id="judul"><h1>Bayar Netflix Anda Bulan ini</h1></div>
    <div class="tabelInput">
        <form action="./cgi-bin/registerData.php" method="POST" class="tabelInput">
            <table border="3" style="border-collapse: collapse">
                <tr><th>Nama</th><td><input type="text" value="" placeholder="Masukan nama" name="nama" required></td></tr>
                <tr><th>Jumlah</th><td>Rp 15.000</td></tr>
            </table>
            <!-- Button bayar akan mengirimkan nama dan status ke dalam list-->
            <input type="submit" name="submit" value="Saya sudah bayar!">
        </form>

        <!-- Section Pop Up-->
        <div class="popup" onclick="showPopUp()">
            <p>Informasi Pembayaran</p>
            <span class="popuptext" id="myPopup">
                <b>Pembayaran melalui OVO<br /></b>
                <h1>082161201170</h1> <br />
                <img src="Assets/ovo.png" /> <br />
                <b>Klik "Saya sudah bayar!" jika sudah membayar dan pembayaran akan dikonfirmasi sesegera mungkin</b></b>
            </span>
        </div>

        <h3>List Bulan Ini</h3>
        <?php
            require_once('./cgi-bin/getList.php');

            getList();
            print('<table border="3px" style="border-collapse: collapse">
                ');
                printf("
                <tr>
                    <th>Nama</th>
                    <th>Status</th>");
                    $nrows = count($_SESSION['lempar']);
                    for($i = 0; $i < $nrows; $i++) {
                    print('
                <tr>
                    ');
                    printf("
                    <td>%s</td>",$_SESSION['lempar'][$i]['nama']);
                    printf("
                    <td>%s</td>",$_SESSION['lempar'][$i]['status_bayar']);
                    if(isset($_SESSION['admin'])){
                    if ($_SESSION['lempar'][$i]['status_bayar'] == "belum dikonfirmasi"){
                    printf("
                    <td><a href=\"./cgi-bin/confirm.php?id=%d\">Konfirmasi</a></td>",$_SESSION['lempar'][$i]['id']);
                    }

                    printf("
                    <td><a href=\"./cgi-bin/deleteUser.php?id=%d\">Hapus</a></td>",$_SESSION['lempar'][$i]['id']);
                    }

                    print('
                </tr>');
                }
                print('
            </table>');
        ?>
    </div>
    <div class="berakhir"><h1>Berakhir pada : 8 Maret 2021</h1></div>
    <footer>FlatOut Developer</footer>
</body>
</html>