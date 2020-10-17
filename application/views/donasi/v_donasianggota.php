<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Upgrade Member
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_DOnasi'); ?>">Data Upgrade Member</a></li>
        <li class="active">Data Upgrade Member</li>
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
              <h3 class="box-title">Data Upgrade Member</h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('donasi-add'); ?>"><button type="button" class="btn btn-warning" >Upgrade Level</button></a>
            </div> 
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th width="120">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($donasianggota as $donasianggota) { 
                    $nourut = $donasianggota->nourut;?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $donasianggota->nik; ?></td>
                      <td><?php echo $donasianggota->username; ?></td>
                      <td><?php echo $donasianggota->levelupgrade; ?></td>
                      <td><?php echo $donasianggota->status; ?></td>
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
