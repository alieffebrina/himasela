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
              $jumlah = $key->nourut; 
            } ?>
            <div class="box-body table-responsive">
              <table>
                <thead>
                </thead>
                <tbody>
                <tr><td>aaaa</td>
                </tr>
                <tr><td>b</td>
                  <td>b</td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="box-body no-padding">
              <ul type='Horizontal'>
                <?php foreach ($user as $user) { ?>

                  <li>
                    <img src="dist/img/user1-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander Pierce</a>
                    <span class="users-list-date">Today</span>
                  </li>
                  <ul type='Horizontal'>
                  
              <?php for ($i=1; $i>$jumlah; $i++) { ?>
                 

                      <li>
                        <img src="dist/img/user1-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date">Today</span>
                      </li>
                <?php } ?></ul>
              <?php } ?>
                </ul>
              <!-- /.users-list -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
