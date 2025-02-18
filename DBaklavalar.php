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
<!-- #######################################################################################################  -->
<br>


<!-- <img src='Baklavalar/".$satir_resim['Baklava_Resim']."' width='300' height='160'/>-->

<div class="wrapper col3">
  <div id="gallery" style="width:1000px; margin:0 auto;">   
    <?php
      $id_bilgi = @$_GET['id'];
      $id_bilgi =  substr($id_bilgi, 64);   
      $id =  substr($id_bilgi, 0, -64); 
      $sorgu_bilgi = mysqli_query($conn,"select * from baklavalar where Baklava_ID='".$id."'");
      $bilgiler = mysqli_fetch_array($sorgu_bilgi);
    ?>
      <p>
      <img height='160' width='300' src="Baklavalar/<?php echo $bilgiler['Baklava_Resim']?>">
      <br>
      <br>
      <?php echo "<font color='pink'>Baklava İsim : </font>".$bilgiler['Baklava_Isim']."" ?>
      <br>
      <br>
      <?php echo "<font color='pink'>Baklava Açıklama : </font>".nl2br($bilgiler['Baklava_Aciklama'])."" ?>
      <br>
      <br>
      <?php echo "<font color='pink'>Baklava Fiyat : </font>".$bilgiler['Baklava_Fiyat']."" ?>
      </p>
    
    <br class="clear"/>
  </div>
</div>
<!-- ####################################################################################################### -->
<!-- <div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left"><a href="kaan_kayacan_121620201028.pdf"><font color="pink">Proje Rapor Formu</font></a></p>
    <p class="fl_right"><a target="_blank" href="Site Template\touch-of-purple" title="Free Website Templates"><font color="pink">Şablon Orjinal Versiyon</font></a></p>
    <br class="clear" />
  </div>
</div> -->
</body>
</html>