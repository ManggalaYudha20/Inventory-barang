
<?php
require 'function.php';



//cek login, terdaftar atau tidak

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //pencocokan dengan database
    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where username='$username' and password='$password'");

    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
        //kalau data ditemukan
        $ambildatarole = mysqli_fetch_array($cekdatabase);
        $role = $ambildatarole['role'];

        if($role=='admin'){
            //kalau rolenya admin
            $_SESSION['log'] = 'True';
            $_SESSION['role'] = 'Admin';
            header('location:index.php');

        } else {
            //kalau bukan admin
            $_SESSION['log'] = 'True';
            $_SESSION['role'] = 'User';
            header('location:user');
        }
        
    } else{
        header('location:login.php');
    };
};

    


?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login-Warehouse PT.DELPI</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container" style="margin-top:110px; width: 800px;">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header text-center">
                                         
                                    <img src="../assets/img/logo-delpi-bitung.png" style="scale:70%;">
                                        
                                    <h3 class="text-center font-weight-light my-4">PT. DELPI <span  style="color:gray;">| LOGIN</span></h3></div>

                                    <div class="card-body">

                                        <form method="post">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>

                                            <div class="form-floating">
                                                 
                                                <input class="form-control" name="username" id="inputUsername" type="username" placeholder="username" />
                                                <label for="inputUsername">Username </label>
                                            </div>
                                        </div>


                                        <div class="input-group mb-3"> 
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>

                                            <div class="form-floating">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>

                                        </div>
                                            
                                            
                                            <div class="d-flex align-items-center justify-content-center mt-1 mb-0">
                                            
                                                <button class="btn btn-primary" name="login" style="width: 200px;">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
