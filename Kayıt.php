<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include('baglan.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sepet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" charset="UTF-8" />
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1">
  <div id="header">
    <div class="fl_left">
      <h1><a href="index.php">Kaan Kayacan</a></h1>
      <p>Baklava Ve Yazılım</p>
    </div>
    <div class="fl_right"><a href="index.php"><img src="images/demo/logo.png" alt="" width="110" style="margin-left:300px;"/></a></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li><a href="index.php">Ana Sayfa</a></li>
        <li><a href="Hakkımızda.php">Hakkımızda</a></li>
        <li><a href="Baklavalar.php">Baklavalar</a></li>
        <li><a href="Sepet.php">Sepet</a></li>
        <li class="active"><a href="kuyegirisi.php">Uye Girişi</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php
if (count($_POST)>0) {
  $kadi = $_POST["kadi"];
  $sifre = $_POST["sifre"];
  $eposta = $_POST["eposta"];
  $adres = $_POST["adres"];
  $istek = 0;
  $say = 0;
  $sorgu = mysqli_query($conn, "select * from musteriler");
  while ($doldur = mysqli_fetch_array($sorgu)) {
    if ($doldur['Musteri_Isim'] == $kadi && $doldur['Musteri_Sifre'] == $sifre) {
      $say = $say + 1;
    }
  }
  if ($say > 0) {
    echo "<h2 align='center'><font color='pink'>Üye Zaten Kayıtlı.</font></h2>";
  } else { 
  $sql = mysqli_query($conn,"Insert Into musteriler (Musteri_Isim,Eposta,SifreSifirlamaIstek,Musteri_Sifre,Musteri_Turu,Musteri_Adres) VALUES ('".$kadi."','".$eposta."','".$istek."','".$sifre."',2,'".$adres."')");
  echo "<h2 align='center'><font color='pink'>Kayıt İşlemi Gerçekleşti</font></h2>";
  }
}
?>
<div class="wrapper col4">
  <div id="container">

    <form name="frmUser" method="post" action="" align="center">
    <h2 align="center"><font color="pink">Üye Girişi</font></h2>
    <font color="pink">İsim : </font><br>
    <input type="text" name="kadi" required minlength='3' maxlength='21'>
    <br><br>
    <font color="pink">Şifre : </font><br>
    <input type="password" name="sifre" required minlength='3' maxlength='21'>
    <br><br>
    <font color="pink">E-posta : </font><br>
    <input type='email' name="eposta" required>
    <br><br>
    <font color="pink">Adres : </font><br>
    <textarea name="adres" rows="5" cols="30" required>Adres</textarea>
    <br><br>
    <input type="submit" name="submit" value="Kayıt Ol">
    <input type="reset">
    <p align='center'>Üye Girişi için <a href='Uyegirisi.php' tite='Çıkış'> tıklayınız.</p>
  </form>

  </div>
</div>
<!-- ####################################################################################################### -->
<!--
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left"><a href="Proje Rapor Formu\kaan_kayacan_121620201028.pdf"><font color="pink">Proje Rapor Formu</font></a></p>
    <p class="fl_right"><a target="_blank" href="Site Template\touch-of-purple" title="Free Website Templates"><font color="pink">Şablon Orjinal Versiyon</font></a></p>
    <br class="clear" />
  </div>
</div> -->
</body>
</html>