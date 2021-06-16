<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Master Komisi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('masterkomisi'); ?>">Data Master Komisi</a></li>
        <li class="active">Data Master Komisi</li>
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
              <h3 class="box-title">Data Master Komisi</h3>
            </div>
            <?php if($aksesadd == 'aktif'){?>
            <div class="box-header">
              <a href="<?php echo site_url('masterkomisi-add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div> 
          <?php } ?>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Level</th>
                  <th>Nominal</th>
                  <th>Poin</th>
                  <th width="120">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($komisi as $komisi) {  ?>  
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo 'Level '.$komisi->level; ?></td>
                      <td><?php echo 'Rp. '.number_format($komisi->nominal,2,',','.'); ?></td>
                      <td><?php echo 'Poin '.$komisi->poin; ?></td>
                      <td><a href="<?php echo site_url('masterkomisi-view/'.$komisi->id_masterkomisi); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('masterkomisi-edit/'.$komisi->id_masterkomisi); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <?php } ?>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_MKomisi/hapus/'.$komisi->id_masterkomisi); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
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
