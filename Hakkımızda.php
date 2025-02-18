<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include('baglan.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Hakkımızda</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" charset="utf-8" />
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
    <div class="fl_right"><a href="index.php"><img src="images/demo/logo.png" alt=""width="110" style="margin-left:300px;" /></a></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li><a href="index.php">Ana Sayfa</a></li>
        <li class="active"><a href="Hakkımızda.php">Hakkımızda</a></li>
        <li><a href="Baklavalar.php">Baklavalar</a></li>
        <li><a href="Sepet.php">Sepet</a></li>
        <li><a href="Uyegirisi.php">Uye Girişi</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="container">
    <div id="content">
      <h1><font color="pink">Hakkımızda</font></h1>
      <?php
      $hsorgu = mysqli_query($conn, "select * from hakkinda");
      $hakkinda = mysqli_fetch_array($hsorgu);
      echo "<font color ='white'>".$hakkinda['hakkinda']."</font>";
      ?>
      <h2><font color="pink"><center>Şubelerimiz</center></font></h2>
      <table style="border:0" summary="Summary Here" cellpadding="0" cellspacing="0">
        <?php
        $rs = 0;
        echo "<tr>";
        $sorgu = mysqli_query($conn,"select * from subeler");
        while ($dsube = mysqli_fetch_array($sorgu)) {
        $rs = $rs + 1;        
        if ($rs%3 != 0) {
          echo "<td  style='text-align: center'><font color = 'pink'><h1>".$dsube['Sube_il']."</font></h1><br><font color='white'>".$dsube['Sube_Adres']."</td></font>";
        } else {
          echo "<td class='last' style='text-align: center'><font color = 'pink'><h1>".$dsube['Sube_il']."</font></h1><br><font color='white'>".$dsube['Sube_Adres']."</td>";
          echo "</tr></font>";
        }
      }?>
      </table>
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