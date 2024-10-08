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
        <title>Barang Keluar</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.js" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
             <!-- Sidebar Toggle-->
           <button class="btn btn-link  order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="color:white;"><i class="fas fa-bars"></i></button>

                <div class="dropdown">
                        <button type="button" class="btn btn-link  order-1 order-lg-0 me-4 me-lg-1" data-bs-toggle="dropdown" style="color:white;"><i class ="fas fa-bell"></i>
                        </button>
                        
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
                                    <a class="nav-link" href="satuan.php">Satuan </a>
                                    <a class="nav-link" href="departemen.php">Departement </a>
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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Barang Keluar</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                       
                        <div class="row">
                          
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="fas fa-plus"></i> Tambah Barang Keluar
                                </button>
                                <a href="exportbk.php" class="btn btn-success"><i class="fas fa-print"></i> Export Data</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                            <th>NO</th>
                                            <th>NAMA BARANG </th>
                                            <th>TANGGAL INPUT</th>
                                            <th>QTY</th>
                                            <th>DEPARTEMEN</th>
                                            <th>PENERIMA </th>
                                            <th>TANGGAL KELUAR </th>
                                            <th>AKSI </th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>


                                    <?php 
                                    $i = 1;
                                    $ambilsemuadatabarangkeluar = mysqli_query($conn, 
                                        "SELECT * FROM barangkeluar bk
                                        JOIN stok s ON bk.idbarang = s.idbarang
                                        ");




                                    while($data=mysqli_fetch_array($ambilsemuadatabarangkeluar)){
                                        $namabarang = $data['namabarang'];
                                        $tanggal = $data['tanggal'];
                                        $penerima = $data['penerima'];
                                        $qty = $data['qty'];
                                        $namadepartemen = $data['namadepartemen'];
                                        $tanggal_keluar = $data['tanggal_keluar'];
                                        $idb = $data['idbarang'];
                                        $idk = $data['idkeluar'];
                                        
                                        
                                        


                                    ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$qty;?></td>
                                            <td><?=$namadepartemen;?></td>
                                            <td><?=$penerima;?></td>   
                                            <td><?=$tanggal_keluar;?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idk;?>">
                                             Edit
                                            </button> 

                                            <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idk;?>">
                                             Delete
                                            </button>
                                            </td> 
                                            
                                        </tr>

                                        <!-- Modal EDIT -->
                                        <div class="modal fade" id="edit<?=$idk;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                            
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang  </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">

                                                            <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                                            <br>
                                                            <input type="text" name="penerima" value="<?=$penerima;?>" class="form-control">
                                                            <br>
                                                            <input type="number" name="qty" value="<?=$qty;?>" class="form-control"required>
                                                            <br>
                                                            <select  name="namadepartemen" value="<?=$namadepartemen;?>" placeholder="Departemen" class="form-control"required>
                                                            <?php

                                                                    $ambilsemuadatanya = mysqli_query($conn, "select * from departemen");
                                                                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                                                                        $namadepartemen = $fetcharray['namadepartemen'];
                                                                        $iddepartemen = $fetcharray['iddepartemen'];

                                                                    ?>
                                                                    
                                                                    <option value="<?=$namadepartemen;?>">
                                                                    <?=$namadepartemen;?>
                                                                    </option>
                                                                    <?php
                                                                    };
                                                                    ?>
                                                            
                                                            </select>
                                                            <br>
                                                            <input type="date" name="tanggal_keluar" value="<?=$tanggal_keluar;?>" class="form-control"required>
                                                            <br>
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <input type="hidden" name="idk" value="<?=$idk;?>">
                                                            
                                                        
                                                        </div>
                                                        
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="updatebarangkeluar"> Edit </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Modal DELETE -->
                                        <div class="modal fade" id="delete<?=$idk;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                            
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Hapus barang  </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">

                                                            yakin ingin menghapus <?=$namabarang;?> ?
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <input type="hidden" name="kty" value="<?=$qty;?>">
                                                            <input type="hidden" name="idk" value="<?=$idk;?>">
                                                            
                                                            <br>
                                                            
                                                        </div>
                                                        
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" name="hapusbarangkeluar"> Hapus </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                    <?php 
                                    };
                                    ?>
                                       
                                    </tbody>
                                </table>
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
    </body>

     <!-- The Modal Tambah Barang Keluar -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang Keluar </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        <input name="barangnya" class="form-control" list="browser" placeholder="Pilih Barang">
        <datalist id="browser">
            <?php

            $ambilsemuadatanya = mysqli_query($conn, "select * from stok");
            while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                $namabarangnya = $fetcharray['namabarang'];
                $idbarangnya = $fetcharray['idbarang'];
            
            ?>
            <option value="<?=$idbarangnya;?>">
                <?=$namabarangnya;?>
            </option>

            <?php
            }

            ?>

        </datalist>
        <br>

        
        <input type="number" name="qty" placeholder="Quantity" class="form-control"required>
        <br>
        <select  name="namadepartemen" value="<?=$namadepartemen;?>" placeholder="Departemen" class="form-control"required>
        <?php

                $ambilsemuadatanya = mysqli_query($conn, "select * from departemen");
                while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                    $namadepartemen = $fetcharray['namadepartemen'];
                    $iddepartemen = $fetcharray['iddepartemen'];

                ?>
                
                <option value="<?=$namadepartemen;?>">
                <?=$namadepartemen;?>
                </option>
                <?php
                };
                ?>
        
         </select>
        <br>
        <input type="date" name="tanggal_keluar" placeholder="tanggal keluar" class="form-control"required>
        <br>
        <input type="text" name="penerima" placeholder="penerima" class="form-control" required>
        
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="addbarangkeluar"> Submit </button>
        </div>
        </form>
        
      </div>
    </div>
  </div>

</html>
