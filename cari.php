<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Selamat Datang di Perpustakaan.com</p>
</body>
</html>
<?php
function cari($keyword)
{
    $link = mysqli_connect(
        "localhost", "root", "etherealZ4M.", "perpustakaan");
    $query =
        "SELECT buku_id, judul FROM buku WHERE judul LIKE '%$keyword%'";
        $result = mysqli_query( $link, $query );
        while ( $row = mysqli_fetch_array( $result ) ) {
        $listbuku[] = $row;
        }
        mysqli_close( $link );
        return $listbuku;
}
function display($listbuku)
{
    // echo "<br><table border=1 style='width:50%'>";
    // echo "<tr><th style='width:10%'>ID</th><th style='width:60%'> Judul </th><th></th></tr>";
    // foreach ($listbuku as $row) {
    //    echo "<tr><td style='text-align: center;'>$row[0]</td><td> $row[1] </td><td style='text-align: center;'><a href='./pinjam/pinjam.php?fitur=add&idbuku=$row[0]&judul=$row[1]'>pinjam</td></tr>";
    // }
    // echo "</table>";
    echo "<br><table border=1 style='width:50%'>";
    echo "<tr><th style='width:10%'>ID</th><th style='width:60%'> Judul </th><th style='width:15%'></th><th style='width:15%'></th></tr>";
        foreach ($listbuku as $row) {
            echo "<tr>
            <td style='text-align: center;'>$row[0]</td><td> $row[1] </td>
            <td style='text-align: center;'><a href='./pinjam/pinjam.php?fitur=add&idbuku=$row[0]&judul=$row[1]'>pinjam</td>
            <td style='text-align: center;'><a href='./detail.php?id_buku=$row[0]'>detail</td>
            </tr>";
    }
    echo "</table>";
}
?>

<form method=get >
<input type='text' name="keyword"/>
<input type='submit' value="CARI"/>
</form>
<a href='./pinjam/pinjam.php?fitur=read'>Lihat Keranjang</a>
<br>