<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Stok
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('stok'); ?>">Data Stok</a></li>
        <li class="active">Detail Stok</li>
      </ol>
    </section>
    <div class="box-body">
          <?=$this->session->flashdata('sukses')?>
          <?=$this->session->flashdata('gagal')?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Stok</h3>
            </div>

            <form class="form-horizontal">
              <div class="box-body">

            <?php foreach ($barang as $barang) {  ?>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;">Barang</label>
                  <div for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">: <?php echo $barang->barang ?></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;">Kategori Barang</label>
                  <div for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">: <?php echo $barang->kategoribarang ?></div>
                </div>


              <a href="<?php echo site_url('stokopname/'.$barang->id_barang); ?>"><button type="button" class="btn btn-warning" >Stok Opname</button></a>
               <?php } ?>
              </div>
            </form>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr align="center">
                  <th>No</th>
                  <th>Tanggal Update</th>
                  <th>Stok Awal</th>
                  <th>Jual / Retur</th>
                  <th>Qty </th>
                  <th>Stok Akhir</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($stok as $stok) {  ?>  
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($stok->tgl_update)); ?></td>
                      <td><?php echo $stok->stokawal; ?></td>
                      <td><?php echo $stok->jenisstok; ?></td>
                      <td><?php echo $stok->stokjalan; ?></td>
                      <td><?php echo $stok->stokakhir; ?></td>
                      <td><?php echo $stok->ket; ?></td>
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
