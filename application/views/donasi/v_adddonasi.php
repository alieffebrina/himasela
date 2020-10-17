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
        <li><a href="<?php echo site_url('donasi'); ?>">Data Upgrade Member</a></li>
        <li class="active">Data Upgrade Member</li>
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
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Bukti Transfer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Donasi/upgrade", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
            <?php foreach ($data as $data) { 
             $levelup = $data->id_upline+1; ?>
              <div class="box-body table-responsive">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <td>NIK</td>
                  <td><?php echo $data->nik ?></td></tr><tr>
                  <td>Nama</td>
                  <td><?php echo $data->nama ?></td></tr><tr>
                  <td>Upline</td>
                  <td><?php echo $data->namaupline ?></td></tr><tr>
                  <td>Upgrade Level</td>
                  <td><?php echo $levelup ?></td></tr><tr>
                  <td>Nominal Donasi</td>
                  <?php foreach ($level as $level) {
                    echo "<td> Rp. ".number_format($level->nominal)."</td></tr><tr>";
                  } ?>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data->id_anggota ?>">
                    <input type="hidden" class="form-control" id="level" name="level" value="<?php echo $levelup ?>">
                    <input type="hidden" class="form-control" id="upline" name="upline" value="<?php echo $data->id_upline ?>">
                  <td>Upload </td>
                  <td>
                    <input type="file" id="imagebt" class="demoInputBox" name="imagebt" required onchange="ValidateSize(tdis)"></td>
                </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('donasi'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            <?php } ?>
           <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
