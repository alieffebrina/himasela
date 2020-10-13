

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <?php 
    foreach ($downline as $downline) {
      $down = $downline->downline;
      // echo 'down'.$down;
    }
    // echo $info;
    if($this->session->userdata('statusanggota') != 'administrator') { 
      if($info >= $down) { ?>
    <div class="alert alert-danger left-icon-alert" role="alert">

          <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
     <?php

       $idlevel = $this->db->query("SELECT MAX(id_level) as id_level from tb_level");
        $lev = $idlevel->result();
        foreach ($lev as $lev) {  $levelmax = $lev->id_level; } 
        $id = $this->session->userdata('id_user');
        $a = $this->db->query("select * from tb_anggota where id_anggota = '$id'"); 
          $b = $a->result();
          foreach ($b as $level) { 
            if ($level->level < $levelmax ){ 
              $upline = $this->db->query("select * from tb_anggota where id_anggota = '$level->id_upline'"); 
              $uplinev = $upline->result();
              foreach ($uplinev as $uplinev) { 
                $up = $level->level+1;
                $donasi = $this->db->query("select * from tb_level where id_level = '$up'"); 
                $donasiv = $donasi->result();
                foreach ($donasiv as $donasiv) { ?>
                  <h2 style="text-align: center"><strong></strong> Silahkan upgrade ke Level <?php echo $level->level+1 ?> dan Donasi ke upline <?php echo $uplinev->nama; ?> sebesar <?php echo 'Rp. '.number_format($donasiv->nominal); ?> No Rek. <?php echo $uplinev->norek.' Bank '.$uplinev->bank.' No HP '.$uplinev->tlp.'</h2>';
                }
              }
            } 
          }
         ?>
    </div>
  <?php } } 
  
    if($this->session->userdata('statusanggota') != 'administrator') { 
       $levelk = $this->db->query("SELECT MAX(id_level) as id_level from tb_level");
        $levelke = $levelk->result();
        foreach ($levelke as $levelke) {  $levelmax = $levelke->id_level; } 
    $id = $this->session->userdata('id_user');
    $a = $this->db->query("select * from tb_anggota where id_anggota = '$id'"); 
    $b = $a->result();
    foreach ($b as $b) { 
      if ($b->level == $levelmax ){ 
        $c = $this->db->query("select * from tb_detailsejahtera where id_anggota = '$id'"); 
        $d = $c->num_rows();
        if($d == NULL){ ?>
          <div class="alert alert-danger left-icon-alert" role="alert">
            <h2 style="text-align: center"><strong></strong> Selamat Anda telah dilevel Dana Kesejahteraan silahkan transfer ke Admin BANK BRI No Rekening 6299-01-019907-53-9 ( Atas nama TITIMMATUL HIMMAH) Konfirmasi Hp No 081615879352 (admin)</h2>
          </div>
        <?php 
        }
      }
    }
    } 
  ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $anggota; ?></h3>

              <p>Jumlah Anggota</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $konfirmupline; ?><sup style="font-size: 20px"></sup></h3>

              <p>Menunggu Konfirmasi Upline</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3><?php echo $konfirmadmin; ?><sup style="font-size: 20px"></sup></h3>

              <p>Menunggu Konfirmasi Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
            <h3><?php echo $sdhbayar; ?><sup style="font-size: 20px"></sup></h3>

              <p>Jumlah Sudah Bayar</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Anggota</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                
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
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($listanggota as $user) { ?>
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
                  <td><?php echo $user->level; ?></td>
                  <td><?php echo $user->statusanggota; ?></td>
                  <input type="hidden" id="id_anggota" name="id_anggota" value="<?php echo $user->id_anggota ?>">
                </tr>
                  <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
 