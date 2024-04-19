<?php
function add($idbuku, $judul)
{
    $link = new mysqli("localhost", "root", "etherealZ4M.", "perpustakaan");
    $query = "INSERT INTO cart (buku_id) VALUES ('$idbuku')";
    mysqli_query($link, $query);
    mysqli_close($link);
}
?>