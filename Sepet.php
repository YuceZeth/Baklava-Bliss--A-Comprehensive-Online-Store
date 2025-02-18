<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include('baglan.php');
error_reporting(0);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <li class="active"><a href="Sepet.php">Sepet</a></li>
        <li><a href="Uyegirisi.php">Uye Girişi</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php
  session_start();
  $id_bilgi = @$_GET['id'];
  $id_bilgi =  substr($id_bilgi, 64);   
  $id =  substr($id_bilgi, 0, -64); 
  $sorgu_bilgi = mysqli_query($conn,"select * from baklavalar where Baklava_ID='".$id."'");
  $doldur = mysqli_fetch_array($sorgu_bilgi);
  $say = mysqli_num_rows($sorgu_bilgi);
?>
<div class="wrapper col4">
  <div id="container">
    <?php
    if ($say >= 0) {
      if (@$_SESSION["id"]) { 
      $mid = $_SESSION["id"];
      $usay = 0;
      $urunkontrol = mysqli_query($conn,"select * from sepet where Baklava_ID='".$id."'");
      while ($dsa = mysqli_fetch_array($urunkontrol)) {
        if ($dsa['Siparis_Gecerliligi'] == 'gecerli') {
          $usay = 1;
        }
      }
        if ($usay == 0 && $say > 0) {
          $esql = mysqli_query($conn,"Insert Into sepet (Musteri_ID,Baklava_ID,Siparis_Gecerliligi,SiprisDurumu_ID,Fiyatlar) VALUES ('".$mid."', '".$id."','gecerli','5','".$doldur['Baklava_Fiyat']."')");
        }
      $sorgu = mysqli_query($conn,"select Musteri_ID from sepet GROUP BY Musteri_ID HAVING COUNT(*) > 0");
      $sat = mysqli_num_rows($sorgu);
      $toplamtutar = 0;
      echo "<table>";
      echo "<thead>"; 
      echo "<tr>";    
      echo "<th>Baklava isim</th>";
      echo "<th>Baklava Açıklama</th>";
      echo "<th>Baklava Fiyat</th>";
      echo "</tr>";
      echo "</thead>";
      if ($sat > 0) {
        while ($sa = mysqli_fetch_array($sorgu)) {
          if ($sa['Musteri_ID'] == $_SESSION["id"]) {
            $a = mysqli_query($conn,"select Baklava_ID from sepet where Siparis_Gecerliligi='gecerli'");
          }
        }
        while ($satir = mysqli_fetch_array($a)) {
        $cs = mysqli_query($conn,"select * from baklavalar where Baklava_ID='".$satir['Baklava_ID']."'");
        $bilgiler = mysqli_fetch_array($cs);
        echo "<tr class='dark'>";
        echo "<tr>";
        echo "<td>".$bilgiler['Baklava_Isim']."</td>";
        echo "<td>".$bilgiler['Baklava_Aciklama']."</td>";
        echo "<td>".$bilgiler['Baklava_Fiyat']."</td>";
        $toplamtutar = $toplamtutar + $bilgiler['Baklava_Fiyat'];
        }echo "</tr>";
      }
        echo "</table>"; 
        $m = mysqli_query($conn, "select * from musteriler where Musteri_ID='".$mid."'");
        $mbilgi = mysqli_fetch_array($m);
        echo "<h3><font color='pink'>Adres : ".$mbilgi['Musteri_Adres']."</font></h3>"; echo "<p><h1><font color='pink'>Toplam Tutar : ".$toplamtutar."</font></h1></p>";
        ?>
        <form name="frmUser" method="post" action="" align="center">
            <input type="submit" name="submit" value="Alışverişi Tamamla" />
        </form>
        <?php
      } else {
        echo "<h2><font color='pink'>Üye Girişi Yapınız.</font></h2>";
        }
      } else {
        echo "<h2><font color='pink'>Sepete Ürün Ekleyiniz</font></h2>";
      }
      ?>
      <?php 
        if($_POST["submit"]){
          $sy = mysqli_query($conn, "select * from sepet where SiprisDurumu_ID ='5'");
          while ($dsy = mysqli_fetch_array($sy)) {
            $esql = mysqli_query($conn,"update sepet set SiprisDurumu_ID='1' where Sepet_ID='".$dsy['Sepet_ID']."' ");
          }
          header("Location:Uyegirisi.php");
        }
      ?>
  </div>
</div>
<!-- ####################################################################################################### -->
<!--
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left"><a href="kaan_kayacan_121620201028.pdf"><font color="pink">Proje Rapor Formu</font></a></p>
    <p class="fl_right"><a target="_blank" href="Site Template\touch-of-purple" title="Free Website Templates"><font color="pink">Şablon Orjinal Versiyon</font></a></p>
    <br class="clear" />
  </div>
</div> -->
</body>
</html>