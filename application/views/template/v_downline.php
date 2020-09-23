 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Batas Downline
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('downline'); ?>">Batas Downline</a></li>
        <li class="active">Batas Downline</li>
      </ol>
    </section>
    <div class="box-body">
          <?=$this->session->flashdata('sukses')?>
          <?=$this->session->flashdata('gagal')?>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">Batas Downline</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach($downline as $downline){ $down = $downline->downline; ?>
            <?php echo form_open("C_Setting/batasdownline", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Batas Downline</label>
                  <div class="col-sm-9">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $downline->id_setting; ?>" >
                    <input type="number" class="form-control" id="downline" name="downline" value="<?php echo $down; ?>" min="0" required>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-info">Simpan</button>
                  </div>
              </div>
              <!-- /.box-footer -->
           <?php echo form_close();
         } ?>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>