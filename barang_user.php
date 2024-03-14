<?php
require_once("database.php");
$tampil = query("select * from barang");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Peminjaman</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand bg-success">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="color: white"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#" style="color:white">SMK BAKTI NUSANTARA 666</a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" style="padding-left: 1200px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="#!">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- side bar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-success bg-opacity-25" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link text-decoration-none" href="home_user.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                            <a class="nav-link" href="data_barang.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Daftar Barang
                            </a>
                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Barang</h1>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                <!-- <h5>Daftar Barang</h5> -->
                            </div>
                            <div class="card-body">
                                 <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <table id="datatablesSimple" class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>id</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Merk</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>id</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Merk</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                        $no =1;
                                        foreach($tampil as $data): ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo"$data[id]";?></td>
                                                <td><?php echo"$data[kode_barang]";?></td>
                                                <td><?php echo"$data[nama_barang]";?></td>
                                                <td><?php echo"$data[kategori]";?></td>
                                                <td><?php echo"$data[merk]";?></td>
                                                <td><?php echo"$data[jumlah]";?></td>
                                            </tr>
                                            <?php 
                                            $no++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>