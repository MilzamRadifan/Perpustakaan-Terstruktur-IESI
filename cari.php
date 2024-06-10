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
function cari($keyword) {
    $link = mysqli_connect("localhost", "root", "etherealZ4M.", "perpustakaan");
    $query = "SELECT buku_id, judul FROM buku WHERE judul LIKE '%$keyword%'";
    $result = mysqli_query($link, $query);
    $listbuku = [];
    
    while ($row = mysqli_fetch_array($result)) {
        $listbuku[] = $row;
    }

    mysqli_close($link);
    return $listbuku;
}

function display($listbuku) {
    if (empty($listbuku)) {
        echo "<br><p>Tidak ada buku yang ditemukan dengan kata kunci tersebut.</p>";
    } else {
        echo "<br><table border=1 style='width:50%'>";
        echo "<tr><th style='width:10%'>ID</th><th style='width:60%'> Judul </th><th style='width:15%'></th><th style='width:15%'></th></tr>";
        foreach ($listbuku as $row) {
            echo "<tr>
                <td style='text-align: center;'>$row[0]</td><td> $row[1] </td>
                <td style='text-align: center;'>
                    <form method='get'>
                        <input type='hidden' name='fitur' value='add'>
                        <input type='hidden' name='idbuku' value='$row[0]'>
                        <input type='hidden' name='judul' value='$row[1]'>
                        <button type='submit' >Add to cart</button>
                    </form>
                </td>

                <td style='text-align: center;'>
                    <form method='get'>
                        <input type='hidden' name='fitur' value='detail'>
                        <input type='hidden' name='idbuku' value='$row[0]'>
                        <button type='submit' >Detail</button>
                    </form>
                </td>
            </tr>";
        }
        echo "</table>";
    }
}
?>

<form method="get">
    <input type="text" name="fitur"/>
    <input type="submit" value="cari"/>
</form>

<form method="get">
    <input type="hidden" name="fitur" value="read"/>
    <button type='submit' >Lihat Keranjang</button>
</form>
<br>