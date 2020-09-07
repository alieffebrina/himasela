<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Donasi User
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_DOnasi'); ?>">Data Donasi User</a></li>
        <li class="active">Data Donasi User</li>
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
              <h3 class="box-title">Data Donasi User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($donasi as $donasi) { 
                  ?>  
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $donasi->nik; ?></td>
                    <td><?php echo $donasi->nama; ?></td>
                    <td><?php echo $donasi->levelupgrade; ?></td>
                    <td><?php echo $donasi->status; ?></td>
                    <td> <a href="<?php echo site_url('C_Donasi/aprove/'.$donasi->id_donasi.'/'.$donasi->id_anggota.'/'.$donasi->levelupgrade); ?>"><button type="button" class="btn btn-info" <?php if($donasi->status!='menunggu aprove'){ echo "disabled"; } ?>><i class="fa fa-fw fa-check"></i></button></a></td>
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
