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
            <?php foreach ($downline as $downline) {
              $jumlah = $downline->downline*$downline->downline; 
              // echo $jumlah;
            } ?> 
            <div class="box-body table-responsive" align="center">
              <div style='overflow-x:scroll; width:100%' align='center'>
                <div style='align-content: center; width: 2700px' class='tree1'>
                  <ul class="list-inline" align='center'>
                    <?php foreach ($parent as $parent) { ?>
                    <li><?php echo "<a class='link' href='".site_url('strukturd/'.$parent->id_anggota)."'>$parent->level<br><img class='image0' src='".base_url()."assets/images/administrator.jpg'></a><br>
                   <a style='width:100px; border-radius:0px' class='btn btn-xs btn-success' href='".site_url('strukturd/'.$parent->id_anggota)."'>".substr($parent->username,0,10)."</a>"; ?>
                    <?php } ?>
                        <ul class="list-inline">

                         <?php 
                         $no = 0;
                         foreach ($child as $child) {
                            echo "<li><a class='link' href='".site_url('strukturd/'.$child->id_anggota)."'>$child->level<br><img class='image0' src='".base_url()."assets/images/administrator.jpg'></a><br>
                           <a style='width:100px; border-radius:0px' class='btn btn-xs btn-success' href='".site_url('strukturd/'.$child->id_anggota)."'>".substr($child->username,0,10)."</a>";
                              $query = $this->db->query('select * from tb_anggota where id_upline = '.$child->id_anggota.'');
                              $down = $query->result();
                              $row = $query->num_rows();
                              if ($row != NULL ){
                              echo "<ul class = 'list-inline'>";
                                foreach ($down as $down) { 
                                    echo "<li><a class='link' href='".site_url('strukturd/'.$down->id_anggota)."'>$down->level<br><img class='image0' src='".base_url()."assets/images/administrator.jpg'></a><br>
                                            <a style='width:100px; border-radius:0px' class='btn btn-xs btn-success' href='".site_url('strukturd/'.$down->id_anggota)."'>".substr($down->username,0,10)."</a></li>";
                                }
                                if ($row < $downline->downline ){
                                    
                                  for ($i=$row; $i <$downline->downline ; $i++) { 
                                    echo "<li><a class='link' href='".site_url('anggota-add')."'>0<br><img class='image0' src='".base_url()."assets/images/user01.png'></a><br>
                                   <a style='width:100px; border-radius:0px' class='btn btn-xs btn-danger' href='".site_url('anggota-add')."'>-</a>";
                                  }
                                }
                              echo "</ul>";
                              } else {
                              echo "<ul class = 'list-inline'>";
                                  for ($i=$row; $i <$downline->downline ; $i++) { 
                                    echo "<li><a class='link'  href='".site_url('anggota-add')."'>0<br><img class='image0' src='".base_url()."assets/images/user01.png'></a><br>
                                   <a style='width:100px; border-radius:0px' class='btn btn-xs btn-danger'  href='".site_url('anggota-add')."'>-</a>";
                                  }
                              echo "</ul>";
                              }
                            echo "</li>";
                            $no++;
                          } ?>
                        </ul>
                    </li>
                  </ul>
                  <br>
                </div>
              </div>
              <br>
      <div style='clear:both'></div><br>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<style type="text/css">
  
* {margin: 0; padding: 0;}
.tree1 ul {
  padding-top: 20px; position: relative;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

.tree1 li {
  float: left; text-align: center;
  list-style-type: none;
  position: relative;
  padding: 20px 3px 0 3px;

  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree1 li::before, .tree1 li::after{
  content: '';
  position: absolute; top: 0; right: 50%;
  border-top: 1px solid #337ab7;
  width: 50%; height: 20px;
}
.tree1 li::after{
  right: auto; left: 50%;
  border-left: 1px solid #337ab7;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree1 li:only-child::after, .tree1 li:only-child::before {
  display: none;
}

/*Remove space from the top of single children*/
.tree1 li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree1 li:first-child::before, .tree1 li:last-child::after{
  border: 0 none;

}
/*Adding back the vertical connector to the last nodes*/
.tree1 li:last-child::before{
  border-right: 1px solid #337ab7;
  border-radius: 0 5px 0 0;
  -webkit-border-radius: 0 5px 0 0;
  -moz-border-radius: 0 5px 0 0;
}
.tree1 li:first-child::after{
  border-radius: 5px 0 0 0;
  -webkit-border-radius: 5px 0 0 0;
  -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree1 ul ul::before{
  content: '';
  position: absolute; top: 0; left: 50%;
  border-left: 1px solid #337ab7;
  width: 0; height: 20px;
}

.tree1 li .link{
  border: 1px solid #337ab7;
  padding: 6px 6px;
  text-decoration: none;
  color: #fff;
  font-weight: bold;
  font-family: arial, verdana, tahoma;
  font-size: 11px;
  display: inline-block;
  background-color: #337ab7;
  border-radius: 5px 5px 0px 0px;
  width:101px;
  -webkit-border-radius: 5px 5px 0px 0px;
  -moz-border-radius: 5px 5px 0px 0px;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

.tree1 li .link0{
  border: 1px solid #8a8a8a;
  padding: 5px 5px;
  text-decoration: none;
  color: red;
  font-weight: bold;
  font-family: arial, verdana, tahoma;
  font-size: 11px;
  display: inline-block;
  background-color: #cecece;
  border-radius: 5px 5px 0px 0px;
  width:101px;
  -webkit-border-radius: 5px 5px 0px 0px;
  -moz-border-radius: 5px 5px 0px 0px;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree1 li a:hover, .tree1 li a:hover+ul li a {
  color: #000; border: 1px solid #94a0b4;
}

/*Connector styles on hover*/
.tree1 li a:hover+ul li::after, 
.tree1 li a:hover+ul li::before, 
.tree1 li a:hover+ul::before, 
.tree1 li a:hover+ul ul::before{
  border-color:  red;
}


.image0{
  border-radius:60px; width:40px;
  border:2px solid #fff;
}

.image{
  border-radius:60px; width:40px;
  border:2px solid #fff;
}

.image2{
  border-radius:60px; width:37px;
  border:2px solid #fff;
}

.judul {
    font-weight: bold;
}
</style>