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

              ?>
            <div class="box-body table-responsive">
              <?php function setCategoryTree($objTree)
                {
                    if (count($objTree->arrChilds) > 0)
                    {
                        echo "<ul>";
                        foreach($objTree->arrChilds AS $objItem)
                        {
                            echo "<li>".$objItem->nama;

                            setCategoryTree($objItem);
                            echo "</li>";

                        }
                        echo "</ul>";

                    }
                }

                setCategoryTree($objTree); ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
