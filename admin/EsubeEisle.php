<?php
include("baglan.php");
$il = $_REQUEST['iller'];
$adres = $_REQUEST['adres'];
$hsorgu = mysqli_query($conn, "insert into subeler (Sube_il, Sube_Adres) VALUES ('".$il."','".$adres."')");
?>