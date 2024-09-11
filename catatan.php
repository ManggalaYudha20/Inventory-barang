
<div class="dropdown me-lg-6" style="margin-left : 85%;">

                        <a type="button" class="btn btn-link  order-1 order-lg-0 me-4 me-lg-1" data-bs-toggle="dropdown" style="color:white;"><i class ="fas fa-message"></i>
                        
                        </a> 
                        
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="alert-content">
                        <div class="card direct-chat direct-chat-primary" style="position: relative; left: 0px; top: 0px;">
                        <div class="card-header ui-sortable-handle">
                            <h3 class="card-title">Catatan</h3>
                        </div>
                         
                                <div class="card-body ">
                                <div class="direct-chat-messages">

                                <div class="">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Isi Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php
                        $conn = mysqli_connect("localhost","root","","stokbarang");

                                $ambilsemuadatacatatan = mysqli_query($conn, 
                                    "SELECT * FROM catatan");

                        while($fetcharray=mysqli_fetch_array($ambilsemuadatacatatan)){
                            $tanggal_catatan = $fetcharray['tanggal_catatan'];
                            $isi_catatan = $fetcharray['isi_catatan'];
                        
                        ?>  
                                    <tr>
                                    <td><?=$tanggal_catatan;?></td>
                                    <td><?=$isi_catatan;?></td>
                                    </tr>
                        <?php
                        };
                        ?>
                        </tbody>
                                </table>
                        </div>
                                <div class="card-footer">
                                <form method="post">
                                <div class="input-group">
                                <input type="text" name="isi_catatan" placeholder="Ketik Catatan ..." class="form-control">
                                <span class="input-group-append">
                                <button type="submit" class="btn btn-primary" name="tambahcatatan">Kirim</button>
                                </span>
                                </div>
                                </form>
                                </div>

                                </div>
                        </div>

                    </div>
                </div>
                </div>
             </div>