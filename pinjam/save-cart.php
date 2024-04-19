<?php
function save()
{
    $link = new mysqli("localhost", "root", "etherealZ4M.", "perpustakaan");

    $hari = $_POST['hari'];
    $buku_id = $_POST['buku_id'];
    echo $idbuku;
    echo $hari;

    // Lakukan perulangan untuk menyimpan setiap nilai hari
    for ($i = 0; $i < count($hari); $i++) {
        $query = "INSERT INTO peminjaman (buku_id, tanggal, hari ) VALUES ('$buku_id[$i]', current_timestamp(), '$hari[$i]')";
    }
    $result = $link->query($query);
    
    $link->close();
    
    
}



?>