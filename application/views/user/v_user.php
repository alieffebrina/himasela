<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $header; ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Data Anggota</a></li>
        <li class="active"><?php echo $header; ?></li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Sukses!</h5>
          <?=$this->session->flashdata('Sukses')?>
        </div>                 
      <?php } ?>
          <?=$this->session->flashdata('Gagal')?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data <?php echo $header; ?></h3>
            </div>
            <div class="box-header">
                <div class="form-group">
                  <a href="<?php echo site_url('anggota-add'); ?>"><button type="button" class="btn btn-warning">Tambah</button></a> 
                  
                  <div class="col-sm-10">
              <?php echo form_open("C_User/get_levelcheck", array('enctype'=>'multipart/form-data') ); ?>
              <div class="input-group">
              
             <select class="form-control" id="levelc" name="levelc" width='10px'>
                <option value="">--Level--</option>
                <option value="0"><?php echo '0'; ?></option>
                <?php foreach ($level as $level) { ?>
                <option value="<?php echo $level->id_level ?>"><?php echo $level->id_level ?></option>
                <?php } ?>
              </select>

                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-info">Cari</button>
                  </span>
                  </div>
           <?php echo form_close(); ?>
         </div>
                </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <?php if ($this->session->userdata('statusanggota') == 'administrator') { ?>
                  <th>Password</th>
                  <?php } ?>
                  <th>Alamat</th>
                  <th>Upline</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th width="120">Action</th>
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
                  
                  <?php if ($this->session->userdata('statusanggota') == 'administrator') { ?>
                  <td><?php echo $user->password; ?></td>
                  <?php } ?>
                  <td><?php echo $user->alamat.', '.$user->name_kota.', '.$user->name_prov; ?></td>
                  <td><?php echo $user->namaupline; ?></td>
                  <td>level <?php echo $user->level; ?></td>
                  <td><?php echo $user->statusanggota; ?></td>
                  <input type="hidden" id="id_anggota" name="id_anggota" value="<?php echo $user->id_anggota ?>">
                  <td> 
                    <div class="btn-group">
                    <?php 
                    $id = $this->session->userdata('statusanggota');
                    if($header == 'Calon Anggota' && $id == 'administrator'){ ?>     
                        <a href="<?php echo site_url('user-aprove/'.$user->id_anggota); ?>"><button type="button" class="btn btn-warning"><i class="fa fa-fw fa-check"></i></button></a> 
                        <a href="<?php echo site_url('C_User/hapuscalon/'.$user->id_anggota); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a> 
                      <?php } ?>
                      <?php if($user->statusanggota == 'tidak aktif'){?>
                      <a href="<?php echo site_url('user-aktivasi/'.$user->id_anggota); ?>"><button type="button" class="btn btn-warning"><i class="fa fa-fw fa-check"></i></button></a> 
                      <?php } ?>
                      <a href="<?php echo site_url('user-view/'.$user->id_anggota); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('user-edit/'.$user->id_anggota); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <?php } ?>
                      <?php if($akseshapus == 'aktif' && $user->statusanggota == 'anggota'){?>
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