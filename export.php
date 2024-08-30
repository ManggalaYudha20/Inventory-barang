<?php
require 'function.php';
require 'cek.php';
?>
<html>
<head>
  <title>Laporan Stok Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>LAPORAN STOK BARANG</h2>
			<h4>(Inventory)</h4>
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA BARANG </th>
                                            <th>DESKRIPSI</th>
                                            <th>STOK</th>
                                            <th>KODE BARANG </th>
                                            <th>JENIS BARANG</th>
                                            <th>SATUAN </th>
                                            
                                        </tr>
                                    </thead>
                                   <tbody>
                                


                                    <?php 
                                    $i = 1;
                                    $ambilsemuadatastok = mysqli_query($conn, 
                                        "SELECT s.idbarang, s.namabarang, s.deskripsi, s.stok, s.kodebarang, s.image , j.namajenis, sa.namasatuan
                                        FROM stok s
                                        JOIN jenis j ON s.namajenis = j.idjenis
                                        JOIN satuan sa ON s.namasatuan = sa.idsatuan
                                    ");

                                    while($data=mysqli_fetch_array($ambilsemuadatastok)){
                                        $namabarang = $data['namabarang'];
                                        $deskripsi = $data['deskripsi'];
                                        $stok = $data['stok'];
                                        $kodebarang = $data['kodebarang'];
                                        $namajenis = $data['namajenis'];
                                        $namasatuan = $data['namasatuan'];
                                        $idb = $data['idbarang'];



                                    ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?php echo$namabarang;?></td>
                                            <td><?php echo$deskripsi;?></td>
                                            <td><?php echo$stok;?></td>
                                            <td><?php echo$kodebarang;?></td>
                                            <td><?php echo$namajenis;?></td>
                                            <td><?php echo$namasatuan;?></td>

                                        </tr>
                                            
                                        <?php 
                                        };
                                        ?>
                                            
                                   
                                    </tbody>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>