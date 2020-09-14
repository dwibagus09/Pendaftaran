<?php include 'koneksi.php';
$page = $_GET['halaman'];
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
        <link rel="stylesheet" type="text/css" href="Https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">  

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
            <?php
            
            if ($page == 'dashboard') {
                include 'dashboard.php';
            }
            elseif ($page == 'pendaftar') {
                include 'pendaftar.php';
            }
            elseif ($page == 'detail?$1') {
                include 'detail.php';
            }

             ?>

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
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#mytable').DataTable({
                    
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf','print'
                    ]
                });
            });
        </script>

    </body>
</html>
