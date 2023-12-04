<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventaris MAN Tanjungpinang</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">MAN Tanjungpinang</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="index.php">
                <i class="fa-solid fa-cloud"></i>
                    <span>Stock Barang</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="masuk.php">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                    <span>Barang Masuk</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="keluar.php">
                <i class="fa-solid fa-cloud-arrow-down"></i>
                    <span>Barang Keluar</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="user.php">
                <i class="fas -regular fa-user"></i>
                    <span>User</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="users.php">
                <i class="fas -regular fa-user"></i>
                    <span>Users</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <div class="form-inline">
                    <h1>Barang Masuk</h1>
                <div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Tambah Barang Masuk
                        </button>
                        <a href="exportmasuk.php" class="btn btn-info"> Cetak Data </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Edit dan Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $ambilsemuadatastock = mysqli_query($conn,"select * from masuk m,  stock s where s.idbarang = m.idbarang ");
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $idb = $data['idbarang'];
                                            $idm = $data['idmasuk'];
                                            $tanggal = $data['tanggal'];
                                            $namabarang = $data['namabarang'];
                                            $qty = $data['qty'];
                                            $keterangan = $data['keterangan'];
                                            
                                    ?>
                                    <tr>
                                        <td><?=$tanggal;?></td>
                                        <td><?=$namabarang;?></td>
                                        <td><?=$qty;?></td>
                                        <td><?=$keterangan;?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idm;?>">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idm;?>">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$idm;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                    
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Edit Barang Masuk</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                        
                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                <input type="text" name="keterangan" value="<?=$keterangan;?>" class="form-control" required>
                                                <br>
                                                <input type="number" name="qty" value="<?=$qty;?>" class="form-control" required>
                                                <br>
                                                <input type="hidden" name="idb" value="<?=$idb;?>">
                                                <input type="hidden" name="idm" value="<?=$idm;?>">
                                                <button type="submit" class="btn btn-primary" name="updatebarangmasuk">Submit</button>
                                                </div>
                                                </form>
                                                        
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?=$idm;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                    
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                        
                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data barang <?=$namabarang;?>?
                                                <input type="hidden" name="idb" value="<?=$idb;?>">
                                                <input type="hidden" name="kty" value="<?=$qty;?>">
                                                <input type="hidden" name="idm" value="<?=$idm;?>">
                                                <br>
                                                <br>
                                                <button type="submit" class="btn btn-danger" name="hapusbarangmasuk">Hapus</button>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Barang Masuk</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">

            <select type="text" name="barangnya" class="form-control" placeholder="Barang" required>
                <?php
                    $ambilsemuadatanya = mysqli_query($conn,"select * from stock");
                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                        $namabarangnya = $fetcharray['namabarang'];
                        $idbarangnya = $fetcharray['idbarang'];
                ?>

                <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>

                <?php
                    }
                ?>
           </select>
            <br>
            <input type="text" name="qty" class="form-control" placeholder="Quantity" required>
            <br>
            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
            <br>
            <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
            </div>
            </form>
            
        </div>
        </div>
    </div>

</html>