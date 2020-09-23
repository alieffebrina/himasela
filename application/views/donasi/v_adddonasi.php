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
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Bukti Transfer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("C_Donasi/upgrade", array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal') ); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Upload Bukti Transfer</label>
                  <div class="col-sm-9">
                        <input type="file" id="imagebt" class="demoInputBox" name="imagebt" required onchange="ValidateSize(this)">
                           
                           <input type="hidden" id="id" name="id" value="<?php echo $idgo; ?>">
                              <input type="hidden" class="form-control" id="level" name="level" value="<?php echo $level ?>">
                  </div>
                </div>
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_barang/index'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                  </div>
              </div>
              <!-- /.box-footer -->
           <?php echo form_close();?>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Donasi User</h3>
            </div> 
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Upline</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($upline as $upline) { 
                    $nourut = $upline->nourut;
                    $cekjumlah = $this->db->query("select * from tb_anggota where nourut Like '$nourut%' "); 
                    $query = $cekjumlah->result();
                    if(count($query)>5){
                      ?>  <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $upline->nik; ?></td>
                            <td><?php echo $upline->nama; ?></td>
                            <td><?php echo $upline->namaupline; ?></td>
                            <td><?php echo $upline->level; ?></td>
                            <td><?php if(count($query)>5){ 
                              $levelup = $upline->level+1;
                              $cekdonasi = $this->db->query("select * from tb_donasi where id_anggota = '$upline->id_anggota' and levelupgrade = '$levelup'");
                              $querydonasi = $cekdonasi->result();
                              if(count($querydonasi) != NULL){
                                foreach ($querydonasi as $key) {
                                  echo $key->status;
                                }
                              } 
                             echo "Upgrade Level"; } else { echo "-"; } ?></td>
                            <td> 
                              <input type="hidden" name="upgrade" id="upgrade" value="<?php echo $levelup.'/'.$upline->id_anggota; ?>">
                              <div class="btn-group">

                                <a href="<?php echo site_url('C_Donasi/bayar/'.$upline->id_anggota.'/'.$levelup); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-dollar"></i></button></a>
                               <!--  <a 
                                    href="javascript:;"
                                    data-id="<?php echo $upline->id_anggota ?>"
                                    data-level="<?php echo $levelup ?>"
                                    data-toggle="modal" data-target="#edit-data"> -->
                                    <!-- <button  data-idgotaaa="<?php echo $upline->id_anggota ?>"
                                    data-level="<?php echo $levelup ?>"
                                    data-toggle="modal" data-target="#edit-data" class="btn btn-info" value="<?php echo $levelup.'/'.$upline->id_anggota; ?>"><i class="fa fa-fw fa-dollar"></i></button> -->
                                <!-- </a> -->
                            
                              </div>
                            </td>
                          </tr>
                        <?php 
                      } 
                    } ?>
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
