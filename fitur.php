<html>
    <body>
<?php
include "cari.php";
$fitur = $_GET['fitur'] ?? null;
switch ($fitur) {
    case 'add':
        $idbuku = $_GET['idbuku'];
        $judul = $_GET['judul'];
        header("location:pinjam/pinjam.php?fitur=$fitur&idbuku=$idbuku&judul=$judul");
        break;
    case 'read':
        header("location:pinjam/pinjam.php?fitur=$fitur");
        break;
    case 'detail':
        $idbuku = $_GET['idbuku'];
        header("location:detail.php?fitur=$fitur&idbuku=$idbuku");
        break;
    case 'cari':
    default:
        $listbuku = cari($fitur);
        display($listbuku);
        break;
}
?>
    </body>
</html>