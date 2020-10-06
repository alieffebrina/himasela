 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dana Kesejahteraan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('sejahtera'); ?>">Dana Kesejahteraan</a></li>
        <li class="active">Anggota Dana Kesejahteraan</li>
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
              <h3 class="box-title">Detail Dana Kesejahteraan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
            <?php foreach ($sejahtera as $key) { ?> 
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="level" name="level" value="<?php echo $key->id_sejahtera ?>" min="0" readonly>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $key->id_sejahtera ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Anggota</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="anggota" name="anggota" value="<?php echo $key->anggota ?>"readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tabungan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="tabungan" value="<?php echo 'Rp. '.number_format($key->tabungan) ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pasif Income</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="income" name="income" value="<?php echo 'Rp. '.number_format($key->income) ?>" readonly>
                  </div>
                </div>
            </div>
              <!-- /.box-footer -->
            <?php } ?>
          </div>
          </div>
          <!-- /.box -->
        </div>
        <?php 
        if($cekanggota < $key->anggota) { ?>
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Anggota  Dana Kesejahteraan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Sejahtera/tambahanggota", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="row">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Anggota</label>
                  <div class="col-sm-9">
                    <input type="hidden" class="form-control" id="id" name="idsejahtera" value="<?php echo $key->id_sejahtera ?>" readonly>
                    <select class="form-control select2" id="idanggota" name="idanggota" style="width: 100%;" required >
                      <?php 
                      foreach ($user as $data) { ?> 
                        <option value="<?php echo $data->id_anggota; ?>"><?php echo $data->nama ?></option>  
                      <?php } ?>
                    </select>   
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('sejahtera'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                  </div>
              </div>
            </div>
            
              <!-- /.box-footer -->
           <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
      <?php } ?>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Anggota</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($anggota as $anggota) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $anggota->nik; ?></td>
                    <td><?php echo $anggota->nama; ?></td>
                    <td><?php echo $anggota->alamat; ?></td>
                    <td>
                      <a href="<?php echo site_url('sejahtera-anggota-edit/'.$anggota->id_detailsejahtera.'/'.$anggota->id_sejahtera); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_Sejahtera/hapusanggota/'.$anggota->id_detailsejahtera.'/'.$anggota->id_sejahtera); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
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
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>