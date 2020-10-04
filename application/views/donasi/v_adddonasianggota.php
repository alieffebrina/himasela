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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upgrade Member</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Donasi/upgrade", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Anggota</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="idanggota" name="id" style="width: 100%;" required onchange="">
                      <option value="">--Pilih--</option>
                      <?php 
                      foreach ($data as $data) { ?> 
                        <option value="<?php echo $data->id_anggota; ?>"><?php echo $data->nama.'-'.$data->nourut; ?></option>  
                      <?php } ?>
                    </select>   
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Upline</label>
                  <div class="col-sm-9"> 
                    <div id="upline"></div>
                    <!-- <input type="text" id="upline" class="form-control" name="upline" readonly> -->
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-9"> 
                    <div id="level"></div>
                    <!-- <input type="text" id="level" class="form-control" name="level" readonly> -->
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nominal Donasi</label>
                  <div class="col-sm-9"> 
                    <div id="nominal"></div>
                    <!-- <input type="text" id="level" class="form-control" name="level" readonly> -->
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Donasi</label>
                  <div class="col-sm-9"> 
                    <input type="file" id="imagebt" class="demoInputBox" name="imagebt" required onchange="ValidateSize(tdis)">
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_Donasi'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Tambah Data</button>
                  </div>
              </div>
              <!-- /.box-footer -->
           <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>