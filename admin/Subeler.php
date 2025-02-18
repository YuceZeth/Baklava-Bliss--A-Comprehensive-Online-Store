<!DOCTYPE html>
<html lang="en">
<?php
include("../Baglan.php")
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>
    <title>Yönetim Paneli</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="minified/themes/default.min.css" id="theme-style" />
          
        <script src="minified/sceditor.min.js"></script>
        <script src="minified/icons/monocons.js"></script>
        <script src="minified/formats/bbcode.js"></script>
        <style>
            form div {
                padding: .5em;
            }
        </style>

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
        $kkodid = hash('sha256', rand(1,1000)).$id.hash('sha256', rand(1,1000));
        ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php echo "<a class='sidebar-brand d-flex align-items-center justify-content-center' href='index.php?id=".$kkodid."'>"; ?>
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hoşgeldin <?php echo $bilgiler['Musteri_Isim']; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <?php echo "<a class='nav-link' href='index.php?id=".$kkodid."'>"; ?>
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
                        <?php echo "<a class='collapse-item' href='Hakkında.php?id=".$kkodid."'>Hakkında</a>"; ?>
                        <?php echo "<a class='collapse-item' href='Subeler.php?id=".$kkodid."'>Subeler</a>"; ?>
                        <?php echo "<a class='collapse-item' href='Baklavalar.php?id=".$kkodid."'>Baklavalar</a>"; ?>
                        <?php echo "<a class='collapse-item' href='Siparisler.php?id=".$kkodid."'>Siparişler</a>"; ?>
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
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
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

                <!-- Begin Page Content -->
                <?php
               /* $sube = mysqli_query($conn, "select * from subeler");
                $csube = mysqli_fetch_array($sube);
                $iller = array(
                    'Adana', 'Adıyaman', 'Afyonkarahisar', 'Ağrı', 'Amasya', 
                    'Ankara', 'Antalya', 'Artvin', 'Aydın', 'Balıkesir', 
                    'Bilecik', 'Bingöl', 'Bitlis', 'Bolu', 'Burdur', 
                    'Bursa', 'Çanakkale', 'Çankırı', 'Çorum', 'Denizli', 
                    'Diyarbakır', 'Edirne', 'Elazığ', 'Erzincan', 'Erzurum', 
                    'Eskişehir', 'Gaziantep', 'Giresun', 'Gümüşhane', 'Hakkari', 
                    'Hatay', 'Isparta', 'Mersin', 'İstanbul', 'İzmir', 
                    'Kars', 'Kastamonu', 'Kayseri', 'Kırklareli', 'Kırşehir', 
                    'Kocaeli', 'Konya', 'Kütahya', 'Malatya', 'Manisa', 
                    'Kahramanmaraş', 'Mardin', 'Muğla', 'Muş', 'Nevşehir', 
                    'Niğde', 'Ordu', 'Rize', 'Sakarya', 'Samsun', 
                    'Siirt', 'Sinop', 'Sivas', 'Tekirdağ', 'Tokat', 
                    'Trabzon', 'Tunceli', 'Şanlıurfa', 'Uşak', 'Van', 
                    'Yozgat', 'Zonguldak', 'Aksaray', 'Bayburt', 'Karaman', 
                    'Kırıkkale', 'Batman', 'Şırnak', 'Bartın', 'Ardahan', 
                    'Iğdır', 'Yalova', 'Karabük', 'Kilis', 'Osmaniye', 
                    'Düzce'
                );*/
                ?>
                    <!--<form>
                        <select name="iller">
                            <?php foreach($iller as $il): ?>
                                <option value="<?php echo $il; ?>"><?php echo $il; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>-->
                <div class="card-body">
                <h2><font color="pink"><center>Şubelerimiz</center></font></h2>
                <form><center><?php echo "<a href='Esubeisle.php?id=".$kkodid."'><input type='button' name='ekle' value='Şube Ekle'></a>"; ?><center></form><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
                    $rs = 0;
                    echo "<tr>";
                    $sorgu = mysqli_query($conn,"select * from subeler");
                    while ($dsube = mysqli_fetch_array($sorgu)) {
                    $id = $dsube['Sube_ID'];
                    $kodid = hash('sha256', rand(1,1000)).$id.hash('sha256', rand(1,1000));
                    $rs = $rs + 1;        
                    if ($rs%3 != 0) {
                      echo "<td  style='text-align: center'><a href='SubelerIsle.php?id=".$kodid."&kid=".$kkodid."'><font color = 'pink'>".$dsube['Sube_il']."</font><br>".$dsube['Sube_Adres']."</a></td>";
                    } else {
                      echo "<td class='last' style='text-align: center'><a href='SubelerIsle.php?id=".$kodid."&kid=".$kkodid."'><font color = 'pink'>".$dsube['Sube_il']."</font><br>".$dsube['Sube_Adres']."</a></td>";
                      echo "</tr>";
                    }
                    }?>
                </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>