n<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Laporan User
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Data Laporan Anggota</a></li>
        <li class="active"><?php echo $header; ?></li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Sukses!</h5>
          <?=$this->session->flashdata('Sukses')?>.
        </div>                 
      <?php } ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Laporan Anggota</h3>
            </div>
            <div class="box-body">
                <div class='row'>
                  <div class='col-lg-12'>
                    <div class="col-sm-3">
                      <form action="<?php echo site_url('C_User/excel')?>" method="post">
                      <button type="submit" name="excel" class="btn btn-warning">Excel</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Alamat</th>
                  <th>Upline</th>
                  <th>Pembayaran</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($user as $user) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $user->nik; ?></td>
                  <td><?php echo $user->nama; ?></td>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo $user->password; ?></td>
                  <td><?php echo $user->alamat.', '.$user->name_kota.', '.$user->name_prov; ?></td>
                  <td><?php echo $user->namaupline; ?></td>
                  <td><?php echo $user->statusbayar; ?></td>
                  <td><?php echo $user->statusanggota; ?></td>
                  <td> 
                    <div class="btn-group">
                    <?php if($header == 'Calon Anggota'){ ?>
                      <a href="<?php echo site_url('C_User/konfirm/'.$user->id_anggota); ?>"><button type="button" class="btn btn-warning"><i class="fa fa-fw fa-check"></i></button></a>
                    <?php } ?>
                      <a href="<?php echo site_url('C_User/view/'.$user->id_anggota); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <a href="<?php echo site_url('C_User/edit/'.$user->id_anggota); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_User/hapus/'.$user->id_anggota); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>