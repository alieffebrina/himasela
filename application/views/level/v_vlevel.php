 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Level
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('level'); ?>">Data Level</a></li>
        <li class="active">Lihat Level</li>
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
              <h3 class="box-title">Lihat Data Level</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($level as $key) {?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="level" name="level" value="<?php echo 'Level '.$key->id_level ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Donasi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="donasi" value="<?php echo 'Rp. '.number_format($key->nominal) ?>" readonly>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('level'); ?>" class="btn btn-default">Kembali</a>
                  </div>
              </div>
            <?php } ?>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>