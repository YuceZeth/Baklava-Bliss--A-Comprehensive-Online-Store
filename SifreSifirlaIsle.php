<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include('baglan.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcıdan gelen kodu al
    $Eposta = $_POST['Eposta'];

    // Doğru Eposta
    $say = 0;
    $sorgu = mysqli_query($conn, "select * from musteriler");
    while ($dbeposta = mysqli_fetch_array($sorgu)) {
      if ($Eposta == $dbeposta['Eposta']) {
        $say = $say + 1;
      }
    }
    if ($say > 0) {
      $ssorgu = mysqli_query($conn, "select * from musteriler where Eposta = '".$Eposta."'");
      $doldur = mysqli_fetch_array($ssorgu);
      $isim = $doldur['Musteri_Isim'];
      $id = $doldur['Musteri_ID'];
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
       // $mail->SMTPDebug = 2;
        $mail->CharSet = 'UTF-8';                                 
        $mail->isSMTP();                                      
        $mail->Host = 'smtp-mail.outlook.com';                       
        $mail->SMTPAuth = true;                               
        $mail->Username = 'kaanbaklava@hotmail.com';                 
        $mail->Password = 'kaan123baklava';                         
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                   

        //Recipients
        $mail->setFrom('kaanbaklava@hotmail.com', 'Kaan Baklava');
        $mail->addAddress($Eposta, $isim);     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Şifre Sıfırlama';
        $mail->Body    = "<br> Şifre Yenileme Linki : <a href='http://localhost/Proje_Baklava/YeniSifre.php?sayfa=sifre_sifirlama&id=".hash('sha256', rand(1,1000)).$id.hash('sha256', rand(1,1000))."'>Sıfırlama Linki </a>";

        $mail->send();
        echo 'Mail Gönderildi. <br>';
        $istek = mysqli_query($conn, "update musteriler set SifreSifirlamaIstek='1' where Musteri_ID='".$id."' ");
    } catch (Exception $e) {
        echo 'Mail gönderilemedi. Hata: ', $mail->ErrorInfo;
    }
    ?>
     <!-- <form name="frmUser" method="post" action="" align="center">
    <font color="pink">KOD : </font> <input type="text" id="kod" required><br><br><br>
    <button id="submit">Gönder</button><br><br>
    <p id="message"></p>
  </form> 
    <script>
    $(document).ready(function() {
        $("#submit").click(function() {
            event.preventDefault();
            var kod = $("#kod").val();
            var sifre = "$ykod";
            $.ajax({
                url: 'YeniSifreIsle.php',
                type: 'POST',
                data: {kod: kod},
                success: function(response) {
                    $("#message").html(response);
                    $('#kod').hide();
                    $('#submit').hide();
                }
            });
        });
    });
    </script> -->
    <?php
      $say = 0;
    } else {
      echo "Yanlış Eposta.";
    }


}
?>
