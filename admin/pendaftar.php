            <?php
            $total = mysqli_query($con,'select * from formpendaftaran order by id desc');
            
            ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Pendaftar</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Pendaftar
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="mytable" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <th width="1%">No</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Email</th>
                                                <th>Handphone</th>
                                                <th>Opsi</th>
                                            </thead>
                                            <tbody>
                                                <?php $no=1; while ($data = mysqli_fetch_array($total)) { ?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <td><?=ucfirst($data['name'])?></td>
                                                    <td><?=ucfirst($data['gender'])?></td>
                                                    <td><?=$data['email']?></td>
                                                    <td><?=$data['phone']?></td>
                                                    <td>
                                                        <a href="detail?id=<?=$data['id']?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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