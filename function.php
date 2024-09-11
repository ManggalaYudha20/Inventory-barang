<?php
session_start();
//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stokbarang");

//menambah barang stok baru
if(isset($_POST['addnewbarang'])){

    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $kodebarang = $_POST['kodebarang'];
    $namajenis = $_POST['namajenis'];
    $namasatuan = $_POST['namasatuan'];
    

    //gambar
    $allowed_extension = array('png','jpg');
    $nama = $_FILES['file']['name']; //mengambil nama gambar
    $ukuran = $_FILES['file']['size']; //mengambil ukuran
    $file_tmp = $_FILES['file']['tmp_name']; //mengambil lokasi gambar
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));//mengambil ekstensi

    //penamaan file -> enkripsi

    $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi;

if(in_array($ekstensi, $allowed_extension) === true){
    if($ukuran < 15000000){
        move_uploaded_file($file_tmp, 'images/'.$image);

        $addtotable = mysqli_query($conn, "insert into stok (namabarang, deskripsi, stok, kodebarang, namajenis, namasatuan, image) 
    values ('$namabarang', '$deskripsi', '$stok', '$kodebarang', '$namajenis', '$namasatuan', '$image')");

    if($addtotable){
        header('location:stok.php');

        } else {
            echo 'gagal';
            header('location:stok.php');
        }

    } else {
        //kalau filenya lebih dari 15mb
        echo '
        <script>
        alert("Ukuran File terlalu besar!");
        window.location.href="stok.php";
        </script>
        ';

    }
} else {
    //kalau filenya tidak png/jpg
    echo '
        <script>
        alert("File Harus .PNG atau .JPG !");
        window.location.href="stok.php";
        </script>
        ';
}

    
 };

 //update stok barang
 if(isset($_POST['updatebarang'])){

    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    //gambar
    $allowed_extension = array('png','jpg');
    $nama = $_FILES['file']['name']; //mengambil nama gambar
    $ukuran = $_FILES['file']['size']; //mengambil ukuran
    $file_tmp = $_FILES['file']['tmp_name']; //mengambil lokasi gambar
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));//mengambil ekstensi

    //penamaan file -> enkripsi

    $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi;

    if($ukuran==0){
        //jika tidak ingin upload
        $update = mysqli_query($conn, "update stok set namabarang='$namabarang', deskripsi='$deskripsi' where idbarang='$idb'"); 

    if($update){
        header('location:stok.php');

        } else {
            echo 'gagal';
            header('location:stok.php');
        }

    } else {
        //jika ingin upload
        move_uploaded_file($file_tmp, 'images/'.$image);
        $update = mysqli_query($conn, "update stok set namabarang='$namabarang', deskripsi='$deskripsi', image='$image' where idbarang='$idb'"); 

    if($update){
        header('location:stok.php');

        } else {
            echo 'gagal';
            header('location:stok.php');
        }

    }

    
 };

 //hapus stok barang
 if(isset($_POST['hapusbarang'])){

    $idb = $_POST['idb'];
    
    $gambar = mysqli_query($conn, "select * from stok where idbarang='$idb'"); 
    $get = mysqli_fetch_array($gambar);
    $img = 'images/'.$get['image'];
    unlink($img);

    $hapus = mysqli_query($conn, "delete from stok where idbarang='$idb'"); 

    if($hapus){
        header('location:stok.php');

        } else {
            echo 'gagal';
            header('location:stok.php');
        }
 };

 //menambah barang masuk
 if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $supplier = $_POST['supplier'];
    $qty = $_POST['qty'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $cekstoksekarang = mysqli_query($conn, "select * from stok where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);
    $stoksekarang = $ambildatanya['stok'];
    $tambahkanstoksekarangdenganquantity = $stoksekarang+$qty;

    $addtomasuk = mysqli_query($conn, "insert into barangmasuk (idbarang,keterangan,qty,tanggal_masuk) 
    values ('$barangnya', '$supplier', '$qty','$tanggal_masuk')");

$updatestokmasuk = mysqli_query($conn, "update stok set stok='$tambahkanstoksekarangdenganquantity' where idbarang='$barangnya'");
    
    if($addtomasuk&&$updatestokmasuk){
        header('location:barangmasuk.php');

        } else {
            echo 'gagal';
            header('location:barangmasuk.php');
        }


};

//edit data barang masuk
if(isset($_POST['updatebarangmasuk'])){

    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $namabarang = $_POST['namabarang'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    
    $lihatstok = mysqli_query($conn, "select * from stok where idbarang='$idb'"); 
    $stoknya = mysqli_fetch_array($lihatstok);
    $stoksekarang = $stoknya['stok'];

    $qtysekarang = mysqli_query($conn, "select * from barangmasuk where idmasuk='$idm'"); 
    $qtynya = mysqli_fetch_array($qtysekarang);
    $qtysekarang = $qtynya['qty'];

    if($qty>$qtysekarang){
        $selisih = $qty-$qtysekarang;
        $tambahkan = $stoksekarang + $selisih;
        $tambahinstoknya = mysqli_query($conn, "update stok set stok='$tambahkan' where idbarang='$idb'"); 
        $updatenya = mysqli_query($conn, "update barangmasuk set qty='$qty', keterangan='$keterangan', tanggal_masuk='$tanggal_masuk' where idmasuk='$idm'"); 
    

    if($tambahinstoknya&&$updatenya){
        header('location:barangmasuk.php');

        } else {
            echo 'gagal';
            header('location:barangmasuk.php');
        }
        } else {
            $selisih = $qtysekarang-$qty;
            $kurangin = $stoksekarang - $selisih;
            $kurangistoknya = mysqli_query($conn, "update stok set stok='$kurangin' where idbarang='$idb'"); 
            $updatenya = mysqli_query($conn, "update barangmasuk set qty='$qty', keterangan='$keterangan', tanggal_masuk='$tanggal_masuk' where idmasuk='$idm'"); 
        }
    
        if($kurangistoknya&&$updatenya){
            header('location:barangmasuk.php');
    
            } else {
                echo 'gagal';
                header('location:barangmasuk.php');
            }
 };

 //menghapus barang masuk
 if(isset($_POST['hapusbarangmasuk'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idm = $_POST['idm'];

    $getdatastok = mysqli_query($conn, "SELECT * FROM stok WHERE idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastok);
    $stokk = $data['stok'];

    $selisih = $stokk-$qty;

    $update = mysqli_query($conn,"update stok set stok='$selisih' where idbarang='$idb'");
    $hapusdata= mysqli_query($conn, "delete from barangmasuk where idmasuk='$idm'");

    if($update&&$hapusdata){
        header('location:barangmasuk.php');
    } else {
        header('location:barangmasuk.php');
    }

 };

//menambah barang keluar
if(isset($_POST['addbarangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    $namadepartemen = $_POST['namadepartemen'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    

    $cekstoksekarang = mysqli_query($conn, "select * from stok where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stoksekarang = $ambildatanya['stok'];

    if($stoksekarang >= $qty){
        //jika stok cukup



            $tambahkanstoksekarangdenganquantity = $stoksekarang-$qty;

            $addtokeluar = mysqli_query($conn, "insert into barangkeluar (idbarang,penerima,qty,namadepartemen,tanggal_keluar) 
            values ('$barangnya', '$penerima', '$qty','$namadepartemen','$tanggal_keluar')");

        $updatestokmasuk = mysqli_query($conn, "update stok set stok='$tambahkanstoksekarangdenganquantity' where idbarang='$barangnya'");
            
            if($addtokeluar&&$updatestokmasuk){
                header('location:barangkeluar.php');

                } else {
                    echo 'gagal';
                    header('location:barangkeluar.php');
                }
    } else {
        //jika stok tidak cukup
        echo '
        <script>
        alert("Stok saat ini tidak mencukupi");
        window.location.href="barangkeluar.php";
        </script>
        ';
    }

};

//edit data barang keluar
if(isset($_POST['updatebarangkeluar'])){

    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $namabarang = $_POST['namabarang'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    $namadepartemen = $_POST['namadepartemen'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    
    $lihatstok = mysqli_query($conn, "select * from stok where idbarang='$idb'"); 
    $stoknya = mysqli_fetch_array($lihatstok);
    $stoksekarang = $stoknya['stok'];

    $qtysekarang = mysqli_query($conn, "select * from barangkeluar where idkeluar='$idk'"); 
    $qtynya = mysqli_fetch_array($qtysekarang);
    $qtysekarang = $qtynya['qty'];

    if($qty>$qtysekarang){
        $selisih = $qty-$qtysekarang;
        $kurangin = $stoksekarang - $selisih;

        if($selisih <= $stoksekarang){
            $kuranginstoknya = mysqli_query($conn, "update stok set stok='$kurangin' where idbarang='$idb'"); 
            $updatenya = mysqli_query($conn, "update barangkeluar set qty='$qty', namadepartemen='$namadepartemen', penerima='$penerima', tanggal_keluar='$tanggal_keluar' where idkeluar='$idk'"); 
    

            if($kuranginstoknya&&$updatenya){
                header('location:barangkeluar.php');

                } else {
                    echo 'gagal';
                    header('location:barangkeluar.php');
                }
        } else {
            echo '
            <script>
            alert("Stok saat ini tidak mencukupi");
            window.location.href="barangkeluar.php";
            </script>
            ';
            exit();
        }
        
        } else {
            $selisih = $qtysekarang-$qty;
            $tambahin = $stoksekarang + $selisih;
            $tambahinstoknya = mysqli_query($conn, "update stok set stok='$tambahin' where idbarang='$idb'"); 
            $updatenya = mysqli_query($conn, "update barangkeluar set qty='$qty', namadepartemen='$namadepartemen', penerima='$penerima', tanggal_keluar='$tanggal_keluar' where idkeluar='$idk'"); 
        }
    
        if($tambahinstoknya&&$updatenya){
            header('location:barangkeluar.php');
    
            } else {
                echo 'gagal';
                header('location:barangkeluar.php');
            }
 };

 //menghapus barang keluar
 if(isset($_POST['hapusbarangkeluar'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idk = $_POST['idk'];

    $getdatastok = mysqli_query($conn, "SELECT * FROM stok WHERE idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastok);
    $stokk = $data['stok'];

    $selisih = $stokk+$qty;

    $update = mysqli_query($conn,"update stok set stok='$selisih' where idbarang='$idb'");
    $hapusdata= mysqli_query($conn, "delete from barangkeluar where idkeluar='$idk'");

    if($update&&$hapusdata){
        header('location:barangkeluar.php');
    } else {
        header('location:barangkeluar.php');
    }

 };

//menambah satuan barang
if(isset($_POST['addnewsatuan'])){

    $namasatuan = $_POST['namasatuan'];
    $keterangan = $_POST['keterangan'];

    $addtosatuan = mysqli_query($conn, "insert into satuan (namasatuan, keterangan) 
    values ('$namasatuan', '$keterangan')");

    if($addtosatuan){
        header('location:satuan.php');

        } else {
            echo 'gagal';
            header('location:satuan.php');
        }
 };

 //edit satuan barang
 if(isset($_POST['updatesatuan'])){
    $namasatuan = $_POST['namasatuan'];
    $keterangan = $_POST['keterangan'];
    $ids = $_POST['ids'];
    

    $queryupdate = mysqli_query($conn,"UPDATE satuan SET namasatuan='$namasatuan' , keterangan='$keterangan' WHERE idsatuan='$ids'" );

    if($queryupdate){
        header('location:satuan.php');
    } else {
        header('location:satuan.php');
    }

 };

 //hapus satuan barang
 if(isset($_POST['hapussatuan'])){
    $id = $_POST['id'];
    

    $querydelete = mysqli_query($conn,"delete from satuan where idsatuan='$id'" );

    if($querydelete){
        header('location:satuan.php');
    } else {
        header('location:satuan.php');
    }

 };

 //menambah jenis barang
if(isset($_POST['addnewjenis'])){

    $namajenis = $_POST['namajenis'];
    $keterangan = $_POST['keterangan'];

    $addtojenis = mysqli_query($conn, "insert into jenis (namajenis, keterangan) 
    values ('$namajenis', '$keterangan')");

    if($addtojenis){
        header('location:jenisbarang.php');

        } else {
            echo 'gagal';
            header('location:jenisbarang.php');
        }
 };

 //edit jenis barang
 if(isset($_POST['updatejenis'])){
    $namajenis = $_POST['namajenis'];
    $keterangan = $_POST['keterangan'];
    $idj = $_POST['idj'];
    

    $queryupdate = mysqli_query($conn,"UPDATE jenis SET namajenis='$namajenis' , keterangan='$keterangan' WHERE idjenis='$idj'" );

    if($queryupdate){
        header('location:jenisbarang.php');
    } else {
        header('location:jenisbarang.php');
    }

 };

 //hapus jenis barang
 if(isset($_POST['hapusjenis'])){
    $id = $_POST['id'];
    

    $querydelete = mysqli_query($conn,"delete from jenis where idjenis='$id'" );

    if($querydelete){
        header('location:jenisbarang.php');
    } else {
        header('location:jenisbarang.php');
    }

 };

 //menambah DEPARTEMEN
 if(isset($_POST['addnewdepartemen'])){

    $namadepartemen = $_POST['namadepartemen'];
    $keterangan = $_POST['keterangan'];

    $addtodepartemen = mysqli_query($conn, "insert into departemen (namadepartemen, keterangan) 
    values ('$namadepartemen', '$keterangan')");

    if($addtodepartemen){
        header('location:departemen.php');

        } else {
            echo 'gagal';
            header('location:departemen.php');
        }
 };

 //edit departemen
 if(isset($_POST['updatedepartemen'])){
    $namadepartemen = $_POST['namadepartemen'];
    $keterangan = $_POST['keterangan'];
    $idd = $_POST['idd'];
    

    $queryupdate = mysqli_query($conn,"UPDATE departemen SET namadepartemen='$namadepartemen' , keterangan='$keterangan' WHERE iddepartemen='$idd'" );

    if($queryupdate){
        header('location:departemen.php');
    } else {
        header('location:departemen.php');
    }

 };

 //hapus departemen
 if(isset($_POST['hapusdepartemen'])){
    $id = $_POST['id'];
    

    $querydelete = mysqli_query($conn,"delete from departemen where iddepartemen='$id'" );

    if($querydelete){
        header('location:departemen.php');
    } else {
        header('location:departemen.php');
    }

 };
 
//menambah pengguna
if(isset($_POST['addpengguna'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    

    $queryinsert = mysqli_query($conn,"INSERT INTO login (username, password, role) values ('$username','$password','$role')" );

    if($queryinsert){
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }

 };

 //edit data pengguna
 if(isset($_POST['updateadmin'])){
    $usernamebaru = $_POST['usernameadmin'];
    $passwordbaru = $_POST['passwordbaru'];
    $rolebaru = $_POST['rolebaru'];
    $idnya = $_POST['id'];
    

    $queryupdate = mysqli_query($conn,"UPDATE login SET username='$usernamebaru' , password='$passwordbaru', role='$rolebaru' WHERE iduser='$idnya'" );

    if($queryupdate){
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }

 };

 //hapus data pengguna
 if(isset($_POST['hapusadmin'])){
    $id = $_POST['id'];
    

    $querydelete = mysqli_query($conn,"delete from login where iduser='$id'" );

    if($querydelete){
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }

 };

 //tambah catatan
 if(isset($_POST['tambahcatatan'])){
    $isi_catatan = $_POST['isi_catatan'];

    $addtocatatan = mysqli_query($conn, "insert into catatan (isi_catatan) 
    values ('$isi_catatan')");

    if($addtocatatan){
        $return_url = isset($_GET['return_url']) ? $_GET['return_url'] : 'catatan.php';
        
        header('location: ', $return_url);
    } else {
        header('location: ', $return_url);
    }
 };


?>