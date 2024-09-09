<!DOCTYPE html>

<?php
require 'function.php';
require 'cek.php';
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.js" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand bg-dark">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link  order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="color:white;"><i class="fas fa-bars"></i>
        </button>

            <div class="dropdown">
                        <a type="button" class="btn btn-link  order-1 order-lg-0 me-4 me-lg-1" data-bs-toggle="dropdown" style="color:white;"><i class ="fas fa-bell"></i>
                        
                        </a> 
                        
                    <div class="dropdown-menu">
                        <div class="alert-content">
                        <div class="alert-content-header">
                            <li><a style="margin-left:5%;">Notifikasi</a></li>
                            <li><hr class="dropdown-divider"/></li>
                        </div>
                                    <?php
                                    $ambildatastok = mysqli_query($conn, "SELECT * FROM stok WHERE stok < 1");

                                    while($fetch = mysqli_fetch_array($ambildatastok)){
                                        $barang = $fetch['namabarang'];
                                    ?>

                                    <div class="alert alert-danger alert-dismissible m-1">
                                        <strong>Perhatian!</strong> Stok <?=$barang;?> Telah Habis!
                                    </div>

                                    <?php
                                    };
                                    ?>
                        </div>

                    </div>
                </div>

            <?php
            include 'catatan.php';
            ?>

                
                <ul class="navbar-nav ms-auto me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="admin.php">Kelola Pengguna</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <a class="navbar-brand ps-3 d-flex align-items-center" href="index.php">
                <img src="../assets/img/logo-delpi-bitung.png" alt="Logo" class="img-fluid" style="width: 30px; height: 30px; margin-right: 10px;">
                Warehouse</a>
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Master Barang
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="jenisbarang.php">Jenis</a>
                                    <a class="nav-link" href="satuan.php">Satuan</a>
                                    <a class="nav-link" href="departemen.php">Departement</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="stok.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                                Stok Barang 
                            </a>

                            <a class="nav-link" href="barangmasuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                                Barang Masuk
                            </a>

                            <a class="nav-link" href="barangkeluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                                Barang Keluar
                            </a>

                            <div class="sb-sidenav-menu-heading">ADMIN</div>

                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Kelola Pengguna 
                            </a>

                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-right-from-bracket"></i></div>
                                Logout
                            </a>
                           
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="jumbotron mt-3 ms-3 me-3">
                                <h2 class=" mt-4 container-fluid px-4 display-6">Dashboard</h2>      
                            <p class="container-fluid px-4 lead">Selamat datang di <span style="font-weight: bold; font-size: 16pt;">WEB WAREHOUSE</span> PT.Delta Pasific Indotuna.</p>
                            <a href="https://delpi.co.id/" target="_blank">
                                <button class="btn btn-flat btn-primary mb-3" style="margin-left:25px;">
                                    <i class="fas fa-globe"></i> Website PT.DELPI
                                </button>
                            </a>
                            </div>
                        
                    <div class="container-fluid px-4">
                        <h3 class="mt-4 ">Informasi Barang </h3>
                        <ol class="breadcrumb mb-4">
                        </ol>

                        

                        <?php

                        //ambil data
                        $get1 = mysqli_query($conn, "select * from stok ");
                        //menghitung seluruh kolom
                        $count1 = mysqli_num_rows($get1);

                        $get2 = mysqli_query($conn, "select * from login");
                        $count2 = mysqli_num_rows($get2);

                        $get3 = mysqli_query($conn, "select * from departemen ");
                        $count3 = mysqli_num_rows($get3);

                        $get4 = mysqli_query($conn, "select * from stok where namajenis='sparepart'");
                        $count4 = mysqli_num_rows($get4);

                        $get5 = mysqli_query($conn, "SELECT * FROM stok ");
                        $row = mysqli_fetch_array($get5);
                        $get5 = $row['idbarang'];

                        $get6 = mysqli_query($conn, "SELECT * FROM stok where namajenis='sparepart'");

                        // Memeriksa apakah ada setidaknya dua baris
                        if (mysqli_num_rows($get6) > 0) {
                            // Melompat ke baris kedua (baris indeks dimulai dari 0)
                            mysqli_data_seek($get6, 0); // 1 berarti baris kedua
                            
                            // Mengambil baris kedua
                            $row = mysqli_fetch_assoc($get6);
                            
                            // Mengambil nilai kolom idbarang dan namabarang
                            $kodebarang2 = $row['kodebarang'];
                            $namabarang2 = $row['namabarang'];
                            $stok2 = $row['stok'];
                            $jenisbarang = $row['namajenis'];
                            $image = $row['image'];

                            while ($row = mysqli_fetch_assoc($get6)) {
                            $kodebarang3 = $row['kodebarang'];
                            $namabarang3 = $row['namabarang'];
                            $stok3 = $row['stok'];
                            $image3 = $row['image'];
                            }

                            mysqli_data_seek($get6, 1);

                            $row = mysqli_fetch_assoc($get6);
                            if ($row) {
                                $kodebarang4 = $row['kodebarang'];
                                $namabarang4 = $row['namabarang'];
                                $stok4 = $row['stok'];
                                $image4 = $row['image'];
                            }



                        } 

                        ?>



                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"> <h3><i class="fas fa-warehouse"></i> STOK BARANG </h3>
                                    <h2 class="mb-0 number-font"><?=$count1?></h2>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"> <h3><i class="fas fa-user"></i> USER</h3>
                                    <h2 class="mb-0 number-font"><?=$count2?></h2>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"><h3><i class="fas fa-building"></i> DEPARTEMEN</h3>
                                    <h2 class="mb-0 number-font"><?=$count3?></h2>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"><h3><i class="fas fa-gear"></i> SPAREPART</h3>
                                    <h2 class="mb-0 number-font"><?=$count4?></h2>
                                    </div>
                                    
                                </div>
                            </div>

                           <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><h3><i class="fas fa-box"></i> GULA</h3>
                                    <h2 class="mb-0 number-font"><?=$stokGula?></h2>
                                    </div>
                                    
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" data-bs-toggle="modal" data-bs-target="#gula" href="#">Lihat Lebih Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>

                                    </div>
                                </div>
                            </div> -->

                            
                     <div class="row ms-auto me-1"> 

                     <form class="d-none d-md-inline-block form-inline ms-auto me-md-0 my-md-4" style="width:30%">
                        <div class="input-group">
                            <input class="form-control" id="searchInput" type="text" placeholder="Search for..."  />
                        </div>
                    </form>

                <div class="row" id="cardContainer"> 
          

                            <div class="container mt-3 col-xl-3 col-md-6 mb-5" data-name="<?=$namabarang3?>">
                                <div class="card" style="width: 300px;">
                                <img class="card-img-top" src="../images/<?=$image3?>" alt="Card image" style="width:100%">
                                <div class="card-body">
                                <h4 class="card-title bg-light"><i class="fas fa-box"></i> <?=$namabarang3?></h4>
                                <h4 class="mb-0 ">Stok Barang =<span class="h4"><?=$stok3?></span></h4>
                                <h4 class="mb-0 ">Kode Barang =<span class="h4"><?=$kodebarang3?></span></h4>
                                <h4 class="mb-0 ">Jenis Barang =<span class="btn btn-dark"><?=$jenisbarang?></span></h4>
                                <p class="card-text"></p>
                                <a class="btn btn-primary" href="barangmasuk.php"><i class="fa fa-plus"></i> Tambah</a>
                                </div>                             
                            </div>
                            </div>

                            <div class="container mt-3 col-xl-3 col-md-6 mb-5" data-name="<?=$namabarang2?>">
                                <div class="card" style="width: 300px;">
                                <img class="card-img-top" src="../images/<?=$image?>" alt="Card image" style="width:100%">
                                <div class="card-body">
                                <h4 class="card-title bg-light"><i class="fas fa-box"></i> <?=$namabarang2?></h4>
                                <h4 class="mb-0 ">Stok Barang =<span class="h4"><?=$stok2?></span></h4>
                                <h4 class="mb-0 ">Kode Barang =<span class="h4"><?=$kodebarang2?></span></h4>
                                <h4 class="mb-0 ">Jenis Barang =<span class="btn btn-dark"><?=$jenisbarang?></span></h4>
                                <p class="card-text"></p>
                                <a class="btn btn-primary" href="barangmasuk.php"><i class="fa fa-plus"></i> Tambah</a>
                             </div>                            
                            </div>
                            </div>

                            <div class="container mt-3 col-xl-3 col-md-6 mb-5" data-name="<?=$namabarang4?>">
                                <div class="card" style="width: 300px;">
                                <img class="card-img-top" src="../images/<?=$image4?>" alt="Card image" style="width:100%">
                                <div class="card-body">
                                <h4 class="card-title bg-light"><i class="fas fa-box"></i> <?=$namabarang4?></h4>
                                <h4 class="mb-0 ">Stok Barang =<span class="h4"><?=$stok4?></span></h4>
                                <h4 class="mb-0 ">Kode Barang =<span class="h4"><?=$kodebarang4?></span></h4>
                                <h4 class="mb-0 ">Jenis Barang =<span class="btn btn-dark"><?=$jenisbarang?></span></h4>
                                <p class="card-text"></p>
                                <a class="btn btn-primary" href="barangmasuk.php"><i class="fa fa-plus"></i> Tambah</a>
                                </div>

                                </div>
                            </div>


                            <script>
                            document.getElementById('searchInput').addEventListener('keyup', function() {
                                var input = this.value.toLowerCase();
                                var cards = document.querySelectorAll('#cardContainer .container');

                                cards.forEach(function(card) {
                                    var cardName = card.getAttribute('data-name').toLowerCase();
                                    if (cardName.includes(input)) {
                                        card.style.display = 'block';
                                    } else {
                                        card.style.display = 'none';
                                    }
                                });
                            });
                            </script>

                    </div>


                            <div class="row">
                        </div>  
                    </div>
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; projek magang</div>
                        
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <!-- The Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    Apakah Anda yakin ingin logout?
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- The Modal -->
<!-- <div class="modal fade" id="gula">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">INFO</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      
      <div class="modal-body">
        <table class="table table-bordered">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Kode Barang</th>
                <th>Satuan</th>
                <th>Jenis</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
              <td>1</td>
              <td>Gula</td>
              <td><?=$get5;?></td>
              <td>555</td>
              <td>Kg</td>
              <td>umum</td>
            </tr>
            
          </tbody>

        </table>
        
        <div class="modal-footer">
        <a href="barangmasuk.php" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        
      </div>

    </div>
  </div>
</div> -->



    </body>
</html>
