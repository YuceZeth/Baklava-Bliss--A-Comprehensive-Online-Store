<?php
include('baglan.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['image']['name']) && isset($_POST['isim']) && isset($_POST['aciklama']) && isset($_POST['fiyat'])){
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $location = '../Baklavalar/' . $name;

        $id = $_POST['id'];
        $isim = $_POST['isim'];
        $aciklama = $_POST['aciklama'];
        $fiyat = $_POST['fiyat'];

        if(move_uploaded_file($tmp_name, $location)){
            // database connection
        	$gbaklava = mysqli_query($conn, "update baklavalar set Baklava_Isim='".$isim."', Baklava_Aciklama='".$aciklama."', Baklava_Fiyat='".$fiyat."' , Baklava_Resim='".$name."'where Baklava_ID = '".$id."'");

            echo 'Ürün ayrıntıları başarıyla güncellendi.';
        }
    }
    else{
        echo 'Lütfen tüm alanları doldurunuz.';
    }
}