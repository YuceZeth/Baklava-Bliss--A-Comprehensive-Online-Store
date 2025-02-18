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
                $hsorgu = mysqli_query($conn ,"select * from hakkinda");
                $hdoldur = mysqli_fetch_array($hsorgu);

                ?>
                <div class="container-fluid">
                    <form action='HakkindaIsle.php' method='post' id='hakkindaisle'>
                    <div align="center">
                       <textarea id="hakkindatext" name="hakkindatext" style='height:550px;width:1083px;'><?php echo $hdoldur['hakkinda'];?></textarea>

                    </div>
                    <div align="center">
                        <label for="theme">Tema:</label>
                        <select id="theme">
                            <option value="default">Varsayılan</option>
                            <option value="defaultdark">Varsayılan karanlık</option>
                            <option value="modern">Modern</option>
                            <option value="office-toolbar">Ofis Araç Çubuğu</option>
                            <option value="office">Ofis</option>
                            <option value="square">Kare</option>
                        </select>
                        <button id="submit">Gönder</button>
                    </div>
                    </form>


        <script>
            // Replace the textarea #example with SCEditor
            var textarea = document.getElementById('hakkindatext');
            sceditor.create(textarea, {
                format: 'xhtml',
                style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css'
            });

              $('#hakkindaisle').submit(function(event) {
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


            var themeInput = document.getElementById('theme');
            themeInput.onchange = function() {
                var theme = 'minified/themes/' + themeInput.value + '.min.css';

                document.getElementById('theme-style').href = theme;
            };
        </script>

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