<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Transaksi Dana Kesejahteraan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('transaksi'); ?>">Data Transaksi Dana Kesejahteraan</a></li>
        <li class="active">Data Transaksi Dana Kesejahteraan</li>
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
              <h3 class="box-title">Data Transaksi Dana Kesejahteraan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Transfer</th>
                  <th>Debit</th>
                  <th>Kredit</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($data as $data){ 
                  $iduser = $this->session->userdata('id_user');
                  $anggota = $this->session->userdata('statusanggota'); 
                  if($iduser == $data->iddupline or $anggota == 'administrator'){ ?>  
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($data->tglupdate)); ?></td>
                      <td><?php if($iduser == $data->iddupline){ echo 'Rp. '.number_format($data->income) ; } else { echo 'Rp. -'; } ?></td>
                      <td><?php if($anggota == 'administrator'){ echo 'Rp. '.number_format($data->income) ; } else { echo 'Rp. -'; } ?></td>
                      <td>Pasif Income Dana Kesejahteraan <?php echo $data->userupline ?></td>
                    </tr>
                 <?php  } ?>
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
