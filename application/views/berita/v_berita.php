<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Berita
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('berita'); ?>">Data Berita</a></li>
        <li class="active"> Berita</li>
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
              <h3 class="box-title">Data Berita</h3>
            </div>
            <?php if($aksesadd == 'aktif'){?>
            <div class="box-header">
              <a href="<?php echo site_url('berita-add'); ?>"><button type="button" class="btn btn-warning" >Tambah Berita</button></a>
            </div> 
          <?php } ?>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Tanggal Upload</th>
                  <th>Judul Berita</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($berita as $berita) {  ?>  
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $berita->nama; ?></td>
                      <td><?php echo $berita->tglupdate; ?></td>
                      <td><?php echo $berita->judul; ?></td>
                      <td><a href="<?php echo site_url('berita-view/'.$berita->id_berita); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('berita-edit/'.$berita->id_berita); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <?php } ?>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_Berita/hapus/'.$berita->id_berita); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                      <?php } ?>
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
