<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload Bukti Transfer
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Bukti Transfer</a></li>
        <li class="active">Lihat Data</li>
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

        <div class='col-lg-12'>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bukti Transfer</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
            <?php echo form_open("C_User/tambahtf", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
                  <?php foreach ($upload as $upload) { ?>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" readonly value="<?php echo $upload->nama ?>">
                      </div>
                  </div>
                </div>
                <br>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Upload</label>
                      <div class="col-sm-9">
                        <input type="file" id="image-file" class="demoInputBox" name="input_gambar" required onchange="ValidateSize(this)">
                        <input type="hidden" class="form-control" id="noanggota" name="noanggota" readonly value="<?php echo $upload->id_anggota ?>">
                        <input type="hidden" class="form-control" id="nik" name="nik" readonly value="<?php echo $upload->nik ?>">
                      </div>
                  </div>
                </div> <br>

                <?php  } ?>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data <?php echo $header; ?></h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('C_User/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Alamat</th>
                  <th>Upline</th>
                  <th>Pembayaran</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($user as $user) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $user->nik; ?></td>
                  <td><?php echo $user->nama; ?></td>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo $user->password; ?></td>
                  <td><?php echo $user->alamat.', '.$user->name_kota.', '.$user->name_prov; ?></td>
                  <td><?php echo $user->namaupline; ?></td>
                  <td><?php echo $user->statusbayar; ?></td>
                  <td><?php echo $user->statusanggota; ?></td>
                  <td> 
                    <div class="btn-group">
                    <?php if($header == 'Calon Anggota'){ 
                      if($user->statusanggota == 'menunggu konfirmasi admin'){ ?>     
                        <a href="<?php echo site_url('C_User/ttf/'.$user->id_anggota); ?>"><button type="button" class="btn btn-warning"><i class="fa fa-fw fa-check"></i></button></a>                   
                          <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaluploadbuktitransfer" data-id="<?php echo $user->id_anggota ?>"><i class="fa fa-fw fa-check"></i></button> -->
                      <?php } else { ?>
                        <a href="<?php echo site_url('C_User/konfirm/'.$user->id_anggota); ?>"><button type="button" class="btn btn-warning"><i class="fa fa-fw fa-check"></i></button></a>
                    <?php } } ?>
                      <a href="<?php echo site_url('C_User/view/'.$user->id_anggota); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('C_User/edit/'.$user->id_anggota); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <?php } ?>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_User/hapus/'.$user->id_anggota); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                      <?php } ?>
                    </div>
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