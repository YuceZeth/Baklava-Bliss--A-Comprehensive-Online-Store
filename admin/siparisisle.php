<?php
include("baglan.php");
$id = $_REQUEST['id'];
if ($_REQUEST['durum'] == 'Bekliyor') {
	$hsorgu = mysqli_query($conn, "update sepet set SiprisDurumu_ID='1' where Sepet_ID = '".$id."'");
} elseif ($_REQUEST['durum'] == 'Hazırlanıyor') {
	$hsorgu = mysqli_query($conn, "update sepet set SiprisDurumu_ID='2' where Sepet_ID = '".$id."'");
} elseif ($_REQUEST['durum'] == 'Teslim Edildi') {
	$hsorgu = mysqli_query($conn, "update sepet set SiprisDurumu_ID='3' where Sepet_ID = '".$id."'");
}elseif ($_REQUEST['durum'] == 'İptal Edildi') {
	$hsorgu = mysqli_query($conn, "update sepet set SiprisDurumu_ID='4' where Sepet_ID = '".$id."'");
}
?>