 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Voucher
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('voucher'); ?>">Voucher</a></li>
        <li class="active">Order Voucher</li>
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
            <div class="box-header with-border">Order Voucher</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Voucher/order", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Order Voucher</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="voucher" name="voucher" placeholder="voucher" required>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-info">Simpan</button>
                  </div>
              </div>
              <!-- /.box-footer -->
           <?php echo form_close(); ?>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Voucher</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Voucher</th>
                  <th>Status</th>
                  <th>Username</th>
                  <th width="120">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($voucher as $voucher) {  ?>  
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $voucher->voucher; ?></td>
                      <td><?php echo $voucher->status; ?></td>
                      <td><?php echo $voucher->username; ?></td>
                      <td>
                      <?php if($voucher->username==NULL){ ?>
                        <a href="<?php echo site_url('anggota-add'); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-user-plus"></i></button></a>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_Voucher/hapus/'.$voucher->id_voucher); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                      <?php } } ?>
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>