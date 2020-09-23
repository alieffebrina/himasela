 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Berita
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('berita'); ?>">Data Berita</a></li>
        <li class="active">Edit Berita</li>
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
              <h3 class="box-title">Edit Berita</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Berita/update", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
            <?php foreach ($berita as $key) { ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $key->judul ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $key->id_berita ?>"y>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Berita</label>
                  <div class="col-sm-9">
                    
                            <textarea id="berita" name="berita" rows="10" cols="80" class="form-control">
                              <?php echo $key->isi ?>
                            </textarea>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('berita'); ?>" class="btn btn-default">Kembali</a>
                    <button type="submit" class="btn btn-info">Tambah Data</button>
                  </div>
              </div>
            <?php } ?>

           <?php echo form_close();?>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>