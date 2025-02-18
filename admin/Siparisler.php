<!DOCTYPE html>
<html lang="en">
<?php
include("../baglan.php")
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yönetim Paneli</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php
    if ( !isset($_GET['id']) ) {
      echo "hata 1 : id tanımlı değil";
      die();
    }
    $id_bilgi = @$_GET['id'];
    $id_bilgi =  substr($id_bilgi, 64);   
    $id =  substr($id_bilgi, 0, -64); 
    $sorgu_bilgi = mysqli_query($conn,"select * from musteriler where Musteri_ID='".$id."'");
    $bilgiler = mysqli_fetch_array($sorgu_bilgi);
    $kodid = hash('sha256', rand(1,1000)).$id.hash('sha256', rand(1,1000));
    ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php echo "<a class='sidebar-brand d-flex align-items-center justify-content-center' href='index.php?id=".$kodid."'>"; ?>
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hoşgeldin <?php echo $bilgiler['Musteri_Isim']; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <?php echo "<a class='nav-link' href='index.php?id=".$kodid."'>"; ?>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Gösterge Paneli</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Arayüz
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Araçlar</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Özel Araçlar:</h6>
                        <?php echo "<a class='collapse-item' href='Hakkında.php?id=".$kodid."'>Hakkında</a>"; ?>
                        <?php echo "<a class='collapse-item' href='Subeler.php?id=".$kodid."'>Subeler</a>"; ?>
                        <?php echo "<a class='collapse-item' href='Baklavalar.php?id=".$kodid."'>Baklavalar</a>"; ?>
                        <?php echo "<a class='collapse-item' href='Siparisler.php?id=".$kodid."'>Siparişler</a>"; ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - Messages -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $bilgiler['Musteri_Isim']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                                       <div class="card-body">
                        <h2><font color="red"><center>Siparişler</center></font></h2>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php
                            echo "<thead>"; 
                            echo "<tr>";    
                            echo "<th>Baklava isim</th>";
                            echo "<th>Baklava Açıklama</th>";
                            echo "<th>Baklava Fiyat</th>";
                            echo "<th>Sipariş Durumu</th>";
                            echo "</tr>";
                            echo "</thead>";
                            $sepet = mysqli_query($conn, "select * from sepet where SiprisDurumu_ID = '1' or SiprisDurumu_ID = '2'");
                            $durum = mysqli_query($conn, "select * from siparisdurumu");
                            $ddurum = array('Bekliyor', 'Hazırlanıyor', 'Teslim Edildi', 'İptal Edildi');
                            while ($dsepet = mysqli_fetch_array($sepet)) {
                                $cs = mysqli_query($conn,"select * from baklavalar where Baklava_ID='".$dsepet['Baklava_ID']."'");
                                $bilgiler = mysqli_fetch_array($cs);
                                echo "<tr>";
                                echo "<td>".$bilgiler['Baklava_Isim']."</td>";
                                echo "<td>".$bilgiler['Baklava_Aciklama']."</td>";
                                echo "<td>".$bilgiler['Baklava_Fiyat']."</td>";
                                echo "<td>";?>                          
                                <form action='siparisisle.php' method='post' id='siparisisle'>
                                    <?php echo "<input type='hidden' name='id' value='".$dsepet['Sepet_ID']."'>"; ?>
                                    <select name="durum">
                                    <?php foreach($ddurum as $durumlar): ?>
                                    <option value="<?php echo $durumlar; ?>"><?php echo $durumlar; ?></option>
                                    <?php endforeach; ?>
                                </select><?php echo "</td>";
                            }echo "</tr>";
                            echo "</table>";
                        ?>
                        </table><center><button id="submit">Gönder</button></form>
                        <script type="text/javascript">
                            $('#siparisisle').on('submit', function(event) {
                                event.preventDefault(); 
                                var form = $(this);
                                $.ajax({
                                  type: form.attr('method'),
                                  url: form.attr('action'),
                                  data: form.serialize(),
                                    success: function(response) {
                                        alert('Veri başarıyla Güncellendi!');
                                    }  
                                  });
                            });
                        </script>
                    </div>
                    <!-- Page Heading -->

                    <!-- Content Row -->
                    <div class="row">

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>