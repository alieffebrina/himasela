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
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($total as $key) {
              $jumlah = intval($key->nouruta); 
              // echo $jumlah;
              
            } 

            // $id_upline = $a
            // $f = $this->db->query("select * from tb_anggota where id_upline = '$e->id_anggota' and id_anggota != $e->id_anggota"); 
            // $g = $c->result();
            // if($g != NULL){
            //   echo '<ul>';
            //   foreach ($g as $h) {
            //     echo '<li>'.$h->nama.'<li>';
            //   }
            // }  

              ?>
            <div class="box-body no-padding">
                  <!-- <ul type='Horizontal'> -->
                     <?php
                       echo '<ul>';
                        $id_upline = 1; 
                        echo $id_upline;
                        $e = $this->db->query("select * from tb_anggota where id_upline = '$id_upline'"); 
                        $b = $e->result();
                        if($b != NULL){
                          for ( $a=1; $a<=13; $a++){
                            foreach ($b as $b) {
                              echo '<li>'.$b->nama.' - '.$b->nourut.'</li>';

                              $id_upline = $b->id_anggota;
                              $c = $this->db->query("select * from tb_anggota where nourut LIKE '$b->nourut%'"); 
                              $d = $c->result();
                              if($d != NULL){
                                echo '<ul>';
                                foreach ($d as $d) {
                                  echo '<li>'.$d->nama.' - '.$d->nourut.'</li>';
                                }  
                              } else {
                                echo '</ul>';   
                              }
                            }
                          }  
                        } else {
                          echo '</ul>';
                        }
                          ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
