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
        <li class="active">Dana Kesejahteraan</li>
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
              <h3 class="box-title">Dana Kesejahteraan</h3>
            </div>

            <?php if($aksesadd == 'aktif'){?>
            <div class="box-header">
              <a href="<?php echo site_url('sejahtera-add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div> 
          <?php } ?>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Level</th>
                  <th>Anggota</th>
                  <th>Tabungan</th>
                  <th>Pasif Income</th>
                  <th width="120">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($income as $income) {  ?>  
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo 'Level '.$income->id_sejahtera; ?></td>
                      <td><?php echo $income->anggota; ?></td>
                      <td><?php echo 'Rp. '.number_format($income->tabungan,2,',','.'); ?></td> 
                      <td><?php echo 'Rp. '.number_format($income->income,2,',','.'); ?></td> 
                      <td><a href="<?php echo site_url('sejahtera-view/'.$income->id_sejahtera); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($this->session->userdata('statusanggota') == 'administrator'){?>
                        <?php $query = $this->db->query('select * from tb_detailsejahtera where id_sejahtera = '.$income->id_sejahtera.'')->num_rows();
                        //echo $query; 
                        if($query<$income->anggota){?>
                      <a href="<?php echo site_url('sejahtera-anggota/'.$income->id_sejahtera); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-users"></i></button></a>
                      <?php } 
                    } ?>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('sejahtera-edit/'.$income->id_sejahtera); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <?php } ?>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_Sejahtera/hapus/'.$income->id_sejahtera); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                      <?php } ?>
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
