<?php
include("baglan.php");
$id = $_REQUEST['id'];
$il = $_REQUEST['il'];
$adres = $_REQUEST['adres'];
$telefon = $_REQUEST['telefon'];
$hsorgu = mysqli_query($conn, "update subeler set Sube_il='".$il."', Sube_Adres='".$adres."', Sube_Telefon='".$telefon."' where Sube_ID = '".$id."'");
?>