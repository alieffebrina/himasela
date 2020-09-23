 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lihat Berita
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('berita'); ?>">Data Berita</a></li>
        <li class="active">Lihat Berita</li>
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
              <h3 class="box-title">Lihat Berita</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($berita as $key) { ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">User</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $key->nama ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $key->tglupdate ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul" name="judul"value="<?php echo $key->judul ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Berita</label>
                  <div class="col-sm-9">
                    
                            <textarea id="berita" name="berita" rows="10" cols="80" class="form-control" readonly>
                              <?php echo $key->isi ?>
                            </textarea>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('berita'); ?>" class="btn btn-default">Kembali</a>
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