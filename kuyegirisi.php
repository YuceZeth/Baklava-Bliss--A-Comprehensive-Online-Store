<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
error_reporting(0);
?>
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
<div class="wrapper col3">
  <div id="container">
    <?php
    session_start();
    if(@$_SESSION["name"]) {
      $id = $_SESSION['id'];
      $kontrol = mysqli_query($conn, "select * from sepet where Siparis_Gecerliligi='gecerli'");
      $gusorgu = mysqli_query($conn, "select * from musteriler where Musteri_ID = '".$id."'");
      $gudoldur = mysqli_fetch_array($gusorgu);
      if ($gudoldur['Musteri_Turu'] == '1') {
        $id = $gudoldur['Musteri_ID'];
        $kodid = hash('sha256', rand(1,1000)).$id.hash('sha256', rand(1,1000));
        echo "<h2><p align='center'><a href='admin\index.php?id=".$kodid."'>Yönetim Paneli</a></p></h2>";
      }
      echo "<p align='center'><font color='pink'><h2>Hoş Geldin ".$gudoldur["Musteri_Isim"]."</h2></font></p>";
      echo "<p align='center'>Çıkmak için <a href='cikis.php' title='Çıkış'> buraya basınız.</p></a>";

    //sepet
    echo "<h2><font color='pink'>Siparişler :</font></h2>";
    echo "<table>";
      echo "<thead>"; 
      echo "<tr>";    
      echo "<th>Baklava isim</th>";
      echo "<th>Baklava Açıklama</th>";
      echo "<th>Baklava Fiyat</th>";
      echo "<th>Sipariş Durumu</th>";
      echo "</tr>";
      echo "</thead>";
      $toplamtutar = 0;
      
      $a = mysqli_query($conn,"select * from sepet where SiprisDurumu_ID = '1' or SiprisDurumu_ID = '2'");
      while ($satir = mysqli_fetch_array($a)) {
        if ($satir['SiprisDurumu_ID'] == '1') {
          $siparisdurum = 'Bekliyor';
          $guncelle = mysqli_query($conn, "update sepet set Siparis_Gecerliligi='Bekliyor' where SiprisDurumu_ID = '1' ");
        } elseif ($satir['SiprisDurumu_ID'] == '2') {
          $siparisdurum = 'Hazırlanıyor';
          $guncelle = mysqli_query($conn, "update sepet set Siparis_Gecerliligi='Hazırlanıyor' where SiprisDurumu_ID = '2' ");
        }
        $cs = mysqli_query($conn,"select * from baklavalar where Baklava_ID='".$satir['Baklava_ID']."'");
        $bilgiler = mysqli_fetch_array($cs);
        echo "<tr class='dark'>";
        echo "<tr>";
        echo "<td>".$bilgiler['Baklava_Isim']."</td>";
        echo "<td>".$bilgiler['Baklava_Aciklama']."</td>";
        echo "<td>".$bilgiler['Baklava_Fiyat']."</td>";
        echo "<td>".$siparisdurum."</td>";
        $toplamtutar = $toplamtutar + $bilgiler['Baklava_Fiyat'];
        }echo "</tr>";
      echo "</table>";
    echo "<p><h1><font color='pink'>Toplam Tutar : ".$toplamtutar."</font></h1></p>";
    }

    //GEÇMİŞ SİPARİŞLER
     echo "<h2><font color='pink'>Geçmiş Siparişler :</font></h2>";
      echo "<table>";
        echo "<thead>"; 
        echo "<tr>";    
        echo "<th>Baklava isim</th>";
        echo "<th>Baklava Açıklama</th>";
        echo "<th>Baklava Fiyat</th>";
        echo "<th>Sipariş Durumu</th>";
        echo "</tr>";
        echo "</thead>";
        $sepetgecerli = mysqli_query($conn, "select * from sepet where Musteri_ID='".$id."'");    
            while ($doldur = mysqli_fetch_array($sepetgecerli)) {
              if ($doldur['Musteri_ID'] == $id) {
                $a = mysqli_query($conn,"select * from sepet where Musteri_ID='".$id."' and SiprisDurumu_ID = '3' or SiprisDurumu_ID = '4'");
              }
            }


          while ($satir = mysqli_fetch_array($a)) {
              if ($satir['SiprisDurumu_ID'] == '3') {
                $siparisdurum = 'Teslim Edildi';
                $guncelle = mysqli_query($conn, "update sepet set Siparis_Gecerliligi='Teslim Edildi' where SiprisDurumu_ID = '3' ");
              } elseif ($satir['SiprisDurumu_ID'] == '4') {
                $siparisdurum = 'İptal Edildi';
                $guncelle = mysqli_query($conn, "update sepet set Siparis_Gecerliligi='İptal Edildi' where SiprisDurumu_ID = '4' ");
              }
              $cs = mysqli_query($conn,"select * from baklavalar where Baklava_ID='".$satir['Baklava_ID']."'");
              $bilgiler = mysqli_fetch_array($cs);
              echo "<tr class='dark'>";
              echo "<tr>";
              echo "<td>".$bilgiler['Baklava_Isim']."</td>";
              echo "<td>".$bilgiler['Baklava_Aciklama']."</td>";
              echo "<td>".$bilgiler['Baklava_Fiyat']."</td>";
              echo "<td>".$siparisdurum."</td>";
          }echo "</tr>";
          echo "</table>";
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
</div>--></body>
</html>