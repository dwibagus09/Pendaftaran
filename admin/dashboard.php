            <?php
            $total = mysqli_query($con,'select * from formpendaftaran');
            $jumlah = mysqli_num_rows($total);
            ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?=$jumlah?></div>
                                            <div>Jumlah Pendaftar</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="pendaftar">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Notification!
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body text-center">
                                    <h5>Hai <b><?php echo ucfirst($_SESSION['username']) ?></b>, Sampai dengan tanggal <b><?=date('d F Y')?></b> Pukul <b><?=date('H:i')?> WIB</b>, Jumlah pendaftar sebanyak <b><?=$jumlah?></b> Orang</h5>
                                </div>
                                <!-- /.panel-body -->
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