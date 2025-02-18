<?php
include('baglan.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcıdan gelen kodu al
    $sifre = $_POST['sifre'];
    $tsifre = $_POST['tsifre'];

    $sorgu = mysqli_query($conn, "select * from musteriler where SifreSifirlamaIstek = '1'");
    $doldur = mysqli_fetch_array($sorgu);
    // Doğru Eposta
    if ($tsifre == $sifre) {
        $ysifre = mysqli_query($conn, "update musteriler set Musteri_Sifre='".$sifre."' where Musteri_ID='".$doldur['Musteri_ID']."'");
        $yistek = mysqli_query($conn, "update musteriler set SifreSifirlamaIstek='0' where Musteri_ID='".$doldur['Musteri_ID']."'");
        echo "Şifre Değiştirildi...";
        sleep(3);
    } else {
        echo "Şifreler Aynı Değil!..";
    }


}
?>
