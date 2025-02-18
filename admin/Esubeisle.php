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

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">    

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Utilities Collapse Menu -->

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>
                    </ul>
                </nav>

                <!-- Begin Page Content -->
                <?php
                $sube = mysqli_query($conn, "select * from subeler");
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
                );
                ?>

                <div class="card-body">
                <h2><font color="red"><center>Şube Ekle</center></font></h2>

                        <form action='EsubeEisle.php' method='post' id='Esubeisle'>
                        <table>
                          <tr>
                          <?php echo "<td><font color='black'>Şube İl : </td><td>"?>
                          <select name="iller">
                            <?php foreach($iller as $il): ?>
                                <option value="<?php echo $il; ?>"><?php echo $il; ?></option>
                            <?php endforeach; ?>
                        </select>
                            <?php echo "</td>" ?>
                          </tr>
                          <tr>
                          <?php echo "<td><font color='black'>Şube Adres : </td><td><textarea name='adres' style='height:100px;width:250px;'></textarea></font></td>" ?>
                          </tr>
                        </table>
                        <?php
                        $id = $_GET['id'];
                        ?>
                        <center><button id="submit">Gönder</button>  <?php echo "<a href='Subeler.php?id=".$id."'><input type='button' value='Geri'></a>";?></center>
                        </form>
                </div>

                <script type="text/javascript">
                $('#Esubeisle').submit(function(event) {
                event.preventDefault(); 
                var form = $(this);
                $.ajax({
                  type: form.attr('method'),
                  url: form.attr('action'),
                  data: form.serialize(),
                        success: function(response) {
                            alert('Veri başarıyla Eklendi!');
                            }  
                      });
                  }); 
                </script>
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