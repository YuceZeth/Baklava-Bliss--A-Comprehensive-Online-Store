<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
error_reporting(0);
include('baglan.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Üye Girişi</title>
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
        <li class="active"><a href="Uyegirisi.php">Uye Girişi</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
      $result = mysqli_query($conn,"select * from musteriler where Musteri_Isim='".$_POST["kadi"]."'");
      $row  = mysqli_fetch_array($result);
      if($row['Musteri_Sifre'] == $_POST['sifre']) {
        $_SESSION["id"] = $row[0];
        $_SESSION["name"] = $row[1];
      } else {
        $message = "<font color='pink'><h2>Geçersiz Kullanıcı Adı Şifre</font></h2>";
      }
    }
    if(isset($_SESSION["id"])) {
    header("Location:kuyegirisi.php");
    }
?>
<div class="wrapper col4">
  <div id="container">

  <form name="frmUser" method="post" action="" align="center">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <h2 align="center"><font color="pink">Üye Girişi</font></h2>
    <font color="pink">Kullanıcı Adı : </font><br>
    <input type="text" name="kadi">
    <br>
    <br>
    <font color="pink">Şifre : </font><br>
    <input type="password" name="sifre">
    <br><br>
    <input type="submit" name="submit" value="Giriş">
    <input type="reset">
    <br>
    <br>
    <a href="Kayıt.php"><h2>Kayıt Ol</h2></a>
    <a href="SifreSifirla.php"><h2>Şifremi Unuttum</h2></a>
  </form>

  </div>
</div>
<!-- ####################################################################################################### -->
<!--
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left"><a href="kaan_kayacan_121620201028.pdf"><font color="pink">Proje Rapor Formu</font></a></p>
    <p class="fl_right"><a target="_blank" href="Site Template\touch-of-purple" title="Free Website Templates"><font color="pink">Şablon Orjinal Versiyon</font></a></p>
    <br class="clear" />
  </div>
</div> -->
</body>
</html>