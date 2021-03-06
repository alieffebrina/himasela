<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stok Opname
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('stok'); ?>">Data Stok</a></li>
        <li class="active">Stok Opname</li>
      </ol>
    </section>
    <div class="box-body">
          <?=$this->session->flashdata('sukses')?>
          <?=$this->session->flashdata('gagal')?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Stok Opname</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_barang/updatestok", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <?php foreach($barang as $barang) { ?>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Barang</label>
                  <div class="col-sm-9">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $barang->id_barang ?>" required>
                    <input type="text" class="form-control" id="barang" name="barang" value="<?php echo $barang->barang ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kategori Barang</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="katbarang" name="katbarang" style="width: 100%;" required>
                      <option value="">--Pilih--</option>
                      <?php foreach ($katbarang as $katbarang) { ?>
                      <option value="<?php echo $katbarang->id_kategoribarang ?>" <?php if ($katbarang->id_kategoribarang == $barang->id_kategoribarang ){ echo "selected"; } ?> ><?php echo $katbarang->kategoribarang ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Stok Min</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="stokmin" name="stokmin"  value="<?php echo $barang->stokmin ?>" required min="0">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Beli</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="hargabeli"  value="<?php echo 'Rp.'.number_format($barang->hargabeli) ?>" required>

                    <input type="hidden" class="form-control" id="hargabeliawal" name="hargabeliawal"  value="<?php echo 'Rp.'.number_format($barang->hargabeli) ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="income" name="hargajual" value="<?php echo 'Rp.'.number_format($barang->hargajual) ?>"  required>
                    <input type="hidden" class="form-control" id="hargajualawal" name="hargajualawal" value="<?php echo 'Rp.'.number_format($barang->hargajual) ?>"  required>
                  </div>
                </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('barang'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
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