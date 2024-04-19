<?php
function save()
{
    $link = new mysqli("localhost", "root", "", "perpustakaan");

    $hari = $_POST['hari'];
    $buku_id = $_POST['buku_id'];

    for ($i = 0; $i < count($hari); $i++) {
        $query = "INSERT INTO peminjaman (buku_id, tanggal, lamaPinjam ) VALUES ('$buku_id[$i]', current_timestamp(), '$hari[$i]')";
    }
    $result = $link->query($query);
    
    mysqli_close($link);
}
?>