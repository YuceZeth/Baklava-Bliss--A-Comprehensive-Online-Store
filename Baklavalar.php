<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include('baglan.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Baklavalar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" charset="UTF-8" />
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/uruntablo.css" type="text/css" />
<style type="text/css">
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: center;
}

td:hover {background-color: #666666;}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
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
        <li class="active"><a href="Baklavalar.php">Baklavalar</a></li>
        <li><a href="Sepet.php">Sepet</a></li>
        <li><a href="Uyegirisi.php">Uye Girişi</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<br>
        <!-- ?sayfa=yazar&id=echo hash('sha256', rand(1,1000)).$satir_yazar['id'].hash('sha256', rand(1,1000)) ?>-->
<?php
  $sorgu_resim = mysqli_query($conn,"select * from Baklavalar ");
?>
<div class="wrapper col3">
  <div id="gallery"  style="width:1000px; margin:0 auto;">
      <table style="border:0">    
        <?php 
        $rs = 0;
        echo "<tr>";
        while ($satir_resim = mysqli_fetch_array($sorgu_resim)) {
        $rs = $rs + 1;
        $id = $satir_resim['Baklava_ID'];
        $kodid = hash('sha256', rand(1,1000)).$id.hash('sha256', rand(1,1000));
        
        if ($rs%3 != 0) {
          echo "<td  style='text-align: center'><a href='DBaklavalar.php?id=".$kodid."'><img src='Baklavalar/".$satir_resim['Baklava_Resim']."' width='270' height='160' class='center' /></a><font color='pink'>".$satir_resim['Baklava_Isim']." | Fiyat : ".$satir_resim['Baklava_Fiyat']."₺<br><a href='Sepet.php?id=".$kodid."'><button type='button'>Sepete Ekle</button></a></font></td>";
        } else {

          echo "<td class='last' style='text-align: center'><a href='DBaklavalar.php?id=".$kodid."'><img src='Baklavalar/".$satir_resim['Baklava_Resim']."' width='270' height='160' class='center'/></a><font color='pink'>".$satir_resim['Baklava_Isim']." | Fiyat : ".$satir_resim['Baklava_Fiyat']."₺<br><a href='Sepet.php?id=".$kodid."'><button type='button'>Sepete Ekle</button></a></font></td>";
          echo "</tr>";
        }
      }
      ?>
      </table>      
    <br class="clear" />
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