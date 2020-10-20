 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Struktur Himasela
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Struktur Himasela</a></li>
        <li class="active">Struktur Himasela</li>
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
              <h3 class="box-title">Struktur Himasela</h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('anggota-add'); ?>"><button type="button" class="btn btn-warning" >Kembali</button></a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($total as $key) {
              $jumlah = $key->nouruta; 
              echo $jumlah;
            } ?>
            <div class="box-body no-padding">
              <?php 
              // foreach ($child as $child) {
              echo "<ul class='clearfix'>";
              if($child->num_rows() > 0){
                  foreach ($child->result() as $ch) {
                      echo "<li>".$ch->id_anggota."-".$ch->nourut; 
                      $C_Struktur->getChild($ch->id_anggota);
                  }
              } 
              echo "</ul>";
              // }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
