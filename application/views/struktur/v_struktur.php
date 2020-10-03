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
             // for ( $a=0; $a<=13; $a++){
             //      for ( $b=1; $b<$a; $b++){
             //        echo $a.'-'.$b.'<br>';
             //      }
             //  }
            
              ?>
            <div class="box-body no-padding">
                  <!-- <ul type='Horizontal'> -->
                  <?php
                       echo '<ul>';
                        $id_upline = 1; 
                        echo $id_upline;
                        $a = $this->db->query("select * from tb_anggota where id_upline = '$id_upline'"); 
                        $b = $a->result();
                        foreach ($b as $b) {

                          
                          echo '<li>'.$b->nama.' - '.$b->nourut.'</li>';

                          $id_upline = $b->id_anggota;
                          for ( $a=0; $a<=13; $a++){
                            $c = $this->db->query("select * from tb_anggota where nourut LIKE '$b->nourut%' and length(nourut) = $a"); 
                            $d = $c->result();
                            echo '<ul>';
                            echo '<ul>';
                            foreach ($d as $d) {
                              echo '<li>'.$d->nama.' - '.$d->nourut.'</li>';
                            } 
                              echo '</ul>';
                          }
                        }
                          echo '</ul>';
                    // } 

                   foreach ($length as $length) {
                     $e = $this->db->query("select * from tb_anggota where id_upline = '$id_upline'");
                     $f = $e->result();
                      $total = $length->no;
                      // if($us == $total) {
                      // echo '<li>'.$user->nama.' - '.$us.'</li>';
                      //   // $index ++;
                      // } 
                      echo $total;
                    // }
                    // echo '</ul><br>';
                  } 
                    ?>
                   

                    <!-- </ul> -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
