 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('barang'); ?>">Data Barang</a></li>
        <li class="active">Edit Barang</li>
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
                    <input type="text" class="form-control" id="barang" name="barang" value="<?php echo $barang->barang ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kategori Barang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="barang" name="barang" value="<?php echo $barang->kategoribarang ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Stok Min</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="stokmin" name="stokmin"  value="<?php echo $barang->stokmin ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok Saat Ini</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="stokawal" name="stokawal"  value="<?php echo $barang->stok ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok Retur Saat Ini</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="stokretur" name="stokretur"  value="<?php echo $barang->stokretur ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Stok</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="jenisstok" name="jenisstok" style="width: 100%;" required>
                      <option value="jual">--Jual--</option>
                      <option value="retur">--Retur--</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok Seharusnya</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="stokjalan" name="stokjalan" placeholder="Stok Seharusnya" required>
                  </div>
                </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('stok'); ?>" class="btn btn-default">Batal</a>
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