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
        <li class="active">Tambah Master Komisi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Master Komisi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_MKomisi/update", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <?php
                  foreach ($kat as $kat) {  ?>  
                  <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-9">

                    <input type="hidden" class="form-control" id="id" name="id"  value="<?php echo $kat->level ?>"  required>
                    <input type="number" class="form-control" id="level" name="level" value="<?php echo $kat->level ?>" min="0" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nominal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="nominal" value="<?php echo $kat->nominal ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Poin</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="rupiah" name="poin" value="<?php echo $kat->poin ?>" min="0" required>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('masterkomisi'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Tambah Data</button>
                  </div>
              </div>
            <?php } ?>
              <!-- /.box-footer -->
           <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>