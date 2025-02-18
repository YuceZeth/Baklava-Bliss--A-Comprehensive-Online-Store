<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Şifre Sıfırlama</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<?php
include('baglan.php');

$uye_bilgi = @$_GET['id'];
$uye_bilgi =  substr($uye_bilgi, 64);
$uye_id =  substr($uye_bilgi, 0, -64);

$sorgu = mysqli_query($conn , "Select * from musteriler where Musteri_ID = '".$uye_id."'");
$doldur = mysqli_fetch_array($sorgu);

if ( !isset($_GET['id']) ) {
  echo "hata 1 : id tanımlı değil";
  die();
}

if ($doldur['SifreSifirlamaIstek'] == '1') {
  ?>
<div class="wrapper col4">
  <div id="container">
  <form name="frmUser" method="post" action="" align="center">
    <h2 align="center"><font color="pink">Şifremi Unuttum</font></h2>
    <table style="border: none;"> 
      <tr>
        <td><font color="pink">Şifre : </font></td>
        <td><input type="password" name="sifre" id="sifre" required minlength='3' maxlength='21'></td>
      </tr>
      <tr>
        <td><font color="pink">Tekrar Şifre : </font></td>
        <td><input type="password" name="tsifre" id="tsifre" required minlength='3' maxlength='21'></td>
      </tr>
    </table>
    <button id="submit">Gönder</button>
    <p id="message"></p>
  </form>
      <script>
    $(document).ready(function() {
        $("#submit").click(function() {
            event.preventDefault();
            var sifre = $("#sifre").val();
            var tsifre = $("#tsifre").val();
            $.ajax({
                url: 'YeniSifreIsle.php',
                type: 'POST',
                data: {sifre: sifre, tsifre: tsifre},
                success: function(response) {
                    $("#message").html(response);
                }
            });
        });
    });
    </script>
  </div>
</div>
  <?php
} else {
  die();
}
?>