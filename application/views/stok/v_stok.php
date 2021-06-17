<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Stok
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('stok'); ?>">Data Stok</a></li>
        <li class="active">Data Stok</li>
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
              <h3 class="box-title">Data Stok</h3>
            </div>

            <!-- <?php if($aksesadd == 'aktif'){?>
            <div class="box-header">
              <a href="<?php echo site_url('barang-add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div> 
          <?php } ?> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr align="center">
                  <th>No</th>
                  <th>Barang</th>
                  <th>Kategori Barang</th>
                  <th>Stok Minimal</th>
                  <th>Stok </th>
                  <th>Stok Retur</th>
                  <th width="120">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($stok as $barang) {  ?>  
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $barang->barang; ?></td>
                      <td><?php echo $barang->kategoribarang; ?></td>
                      <td><?php echo $barang->stokmin; ?></td>
                      <td><?php echo $barang->stok; ?></td>
                      <td><?php echo $barang->stokretur; ?></td>
                      <td><a href="<?php echo site_url('stok-view/'.$barang->id_barang); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <!-- <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('barang-edit/'.$barang->id_barang); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <?php } ?> -->
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
