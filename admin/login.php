<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login Admin - <?=$web?></title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../assets/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <center><img src="../assets/dosen.png" width="120"></center><br>
                            <form role="form" method="post" action="aksi/login.php">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Masukan Username" name="username" type="text" autofocus required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Masukan Password" name="password" type="password" value="" required="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input class="btn btn-success btn-block" value="Login" name="submit" type="submit" >
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../assets/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../assets/js/startmin.js"></script>
        <script src="../assets/alert.js"></script>

    </body>
</html>
