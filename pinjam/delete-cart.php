<?php
function delete($i)
{
    $link = new mysqli("localhost", "root", "", "perpustakaan");
    $query = "DELETE FROM cart WHERE buku_id='$i'";
    mysqli_query($link, $query);
    mysqli_close($link);
}
?>