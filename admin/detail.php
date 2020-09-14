<?php include 'koneksi.php';
$id = $_GET['id'];
$query1 = mysqli_query($con,"select id,name,gender,email,phone,address,(select nama from kelurahan where id_kel=a.kel) as kel, (select nama from kecamatan where id_kec=a.kec) as kec, (select nama from kabupaten where id_kab=a.kota) as kota, (select nama from provinsi where id_prov=a.prop) as prop, course,info,tgllahir,ig,fb,wa,minat from formpendaftaran a where id=$id");
$row1 = mysqli_fetch_array($query1);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard - <?= $web ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../assets/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../assets/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../assets/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
         <!-- DataTables CSS -->
        <link href="../assets/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../assets/css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard"><?= $web ?></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo ucfirst($_SESSION['username']) ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li> -->
                            <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="dashboard" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="pendaftar"><i class="fa fa-users fa-fw"></i> Data Pendaftar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Detail Data <?php echo $row1['name']; ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail Data Pendaftar
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                        <div class="form">
                                        <!-- Displaying Data Read From Database -->
                                        <span>Nama:</span> <?php echo $row1['name']; ?><br><br>
                                        <span>Jenis Kelamin:</span> <?php echo $row1['gender']; ?><br><br>
                                        <span>Tanggal Lahir:</span> <?php echo $row1['tgllahir']; ?><br><br>
                                        <span>Alamat:</span> <?php echo $row1['address']; ?><br><br>
                                        <span>Kelurahan/Desa:</span> <?php echo $row1['kel']; ?><br><br>
                                        <span>Kecamatan:</span> <?php echo $row1['kec']; ?><br><br>
                                        <span>Kota/Kab:</span> <?php echo $row1['kota']; ?><br><br>
                                        <span>Propinsi:</span> <?php echo $row1['prop']; ?><br><br>
                                        <span>Minat:</span> <?php echo $row1['minat']; ?><br><br>   
                                        <span>Pelatihan:</span> <?php echo $row1['course']; ?><br><br>
                                        <span>Info:</span> <?php echo $row1['info'];  ?><br><br>
                                        <span>E-mail:</span> <?php echo $row1['email']; ?><br><br>
                                        <span>No Kontak:</span> <?php echo $row1['phone']; ?><br><br>
                                         <span>Instagram:</span> <?php echo $row1['ig']; ?><br><br>
                                        <span>Facebook:</span> <?php echo $row1['fb']; ?><br><br>
                                        <span>Whatsapp:</span> <?php echo $row1['wa'];?>
                                        </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <div class="panel-footer">
                                <a href="pendaftar" class="btn btn-danger">Kembali</a>
                                <button class="btn btn-primary" onclick="window.print()">Print</button>
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../assets/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../assets/js/startmin.js"></script>
         <!-- DataTables JavaScript -->
        <script src="../assets/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../assets/js/dataTables/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#mytable').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>


            
            