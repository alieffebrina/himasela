 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Profil Anggota
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Data Anggota</a></li>
        <li class="active">Profil Anggota</li>
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
              <h3 class="box-title">Profil Anggota</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Profil/edit", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <?php foreach ($user as $key) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16" minlength="16" value="<?php echo $key->nik ?>" onkeypress="return Angkasaja(event)" readonly>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $key->id_anggota ?>">
                  <span id="pesannik"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $key->nama ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $key->username ?>" maxlength='16' >
                    <span style="color: red"> Maksimal 16 karakter</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $key->password ?>" maxlength='10' >
                    <span style="color: red"> Maksimal 10 karakter</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    
                    <input type="text" class="form-control" id="prov" name="prov" value="<?php echo $key->name_prov ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;"readonly>
                    <option value="<?php echo $key->id_kota ?>"><?php echo $key->name_kota ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;" readonly>
                    <option value="<?php echo $key->id_kecamatan ?>"><?php echo $key->kecamatan ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" readonly><?php echo $key->alamat; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo $key->tlp; ?>" maxlength="12" minlength="6" onkeypress="return Angkasaja(event)" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">E-Mail</label>
                  <div class="col-sm-9"> 
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $key->email; ?>" readonly>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Upline</label>
                  <div class="col-sm-9">
                    <input type="hidden" class="form-control" id="upline" name="upline" value="<?php echo $key->id_upline; ?>" readonly> 
                    <input type="text" class="form-control" value="<?php echo $key->namaupline; ?>" readonly>               
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah HU</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="jumlahhu" name="jumlahhu" value="<?php echo $key->jumlahhu; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bank</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="bank" name="bank" value="<?php echo $key->bank; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Rekening</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="norek" name="norek" value="<?php echo $key->norek; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Pemilik</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?php echo $key->pemilik; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Sponsor</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namasponsor" name="namasponsor" value="<?php echo $key->namasponsor; ?>" readonly>
                  </div>
                </div>
              </div>
            <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('Welcome'); ?>" class="btn btn-default">Batal</a>
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