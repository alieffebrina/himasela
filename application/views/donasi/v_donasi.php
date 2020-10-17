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
        <li><a href="<?php echo site_url('donasi'); ?>">Data Upgrade Member</a></li>
        <li class="active">Data Upgrade Member</li>
      </ol>
    </section>
    <div class="box-body">
          <?=$this->session->flashdata('sukses')?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Upgrade Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Username</th>
                  <th>Upline</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th width="120">Action</th>
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
                            <td><?php echo $upline->username; ?></td>
                            <td><?php echo $upline->namaupline; ?></td>
                            <td><?php echo $upline->level; ?></td>
                            <td><?php 
                              $levelup = $upline->level+1;
                              $cekdonasi = $this->db->query("select * from tb_donasi where id_anggota = '$upline->id_anggota' and levelupgrade = '$levelup'");
                              $querydonasi = $cekdonasi->result();
                              if(count($querydonasi) != NULL){
                                foreach ($querydonasi as $key) {
                                  echo $key->status."<td><button type='button' disabled class='btn btn-info'><i class='fa fa-fw fa-dollar'></i></button></td>";
                                }
                              } else { echo "Upgrade Level"; ?></td>
                            <td> 

                                <a href="<?php echo site_url('donasi-bayar/'.$upline->id_anggota.'/'.$levelup); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-dollar"></i></button></a>
                            </td>
                          <?php } ?>
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
