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
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 l-3" style="padding-left: 1200px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
        </nav>
        <!-- side bar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-success bg-opacity-25" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link text-decoration-none" href="home.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                            <a class="nav-link" href="data_barang.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Daftar Barang
                            </a>
                            <a class="nav-link collapsed" style="color:black;" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Peminjaman
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="data_peminjaman.php" style="color: black;">Daftar Pinjam</a>
                                    <a class="nav-link" href="form_peminjaman.php" style="color: black;">Peminjaman Baru</a>
                                </nav>
                            </div>
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <a class="nav-link" href="data_user.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-circle"></i></div>
                                User
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
                                
                                <!-- Modal -->
                                <button type="button" style="float:right;" class="btn btn-success position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Barang
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog"> 
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="proses_input.php" method="post">
                                                <!-- <div class="mb-3">
                                                        <label form="disabledTextInput" class="form-label">ID</label>
                                                        <input type="text" id="id" name="id" class="form-control" placeholder="id">
                                                    </div> -->
                                                    <div class="mb-3">
                                                        <label form="disabledTextInput" class="form-label">Kode Barang</label>
                                                        <input type="text" id="kode_barang" name="kode_barang" class="form-control" placeholder="Kode Barang">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label form="disabledTextInput" class="form-label">Nama Barang</label>
                                                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label form="status" class="form-label">Kategori</label>
                                                        <select id="kategori" name="kategori" class="form-select" placeholder="Kategori">
                                                            <option>Alat Musik</option>
                                                            <option>Alat Kebersihan</option>
                                                            <option>Peralatan Kelas</option>
                                                            <option>Fasilitas Sekolah</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label form="disabledSelect" class="form-label">Merk</label>
                                                        <select id="merk" name="merk" class="form-select">
                                                            <option>Yamaha</option>
                                                            <option>Broco</option>
                                                            <option>Bangku</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label form="disabledTextInput" class="form-label">Jumlah</label>
                                                        <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </form>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->

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
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
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
                                                <td>
                                                    <a href='edit_brg.php?id=<?= $data['id'] ?>' class="btn btn-success btn-small">Edit</a>
                                                    <?php echo "<a href='javascript:hapusData(".$data['id'].")'' class='btn btn-danger btn-small'>Hapus</a>"; ?>
                                                </td>
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
                <footer class="py-4 mt-auto bg-light">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Morce</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script language="JavaScript" type="text/javascript">
        function hapusData(id){
            if(confirm("Apakah anda yakin akan menghapus data ini?")){
                window.location.href = 'hapus_barang.php?id=' + id;
            }
        }
        </script>

        <!-- <script src="asset/js/jquery-3.4.1.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>