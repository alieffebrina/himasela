<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data History Transaksi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('transaksi'); ?>">Data History Transaksi</a></li>
        <li class="active">Data History Transaksi</li>
      </ol>
    </section>
    <div class="box-body">
          <?=$this->session->flashdata('sukses')?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data History Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Transaksi</th>
                  <th>Debet</th>
                  <th>Kredit</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($data as $data){ 
                  $iduser = $this->session->userdata('id_user'); ?>  
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data->tglbayar; ?></td>
                      <td><?php if($iduser == $data->id_upline){ echo 'Rp. '.number_format($data->nominal) ; } else { echo 'Rp. -'; } ?></td>
                      <td><?php if($iduser == $data->id_anggota){ echo 'Rp. '.number_format($data->nominal) ; } else { echo 'Rp. -'; } ?></td>
                      <td><?php if($iduser == $data->id_upline){ echo $data->nama.' Upgrade Level Ke '.$data->levelupgrade ; } else { echo 'Upgrade Level Ke '.$data->levelupgrade; } ?></td>
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
