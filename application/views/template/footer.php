
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Development By &copy; 2020 <a href="https://hosterweb.co.id">HOSTERWEB INDONESIA</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts
<script src="<?php //echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php //echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap 
<script src="<?php //echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php //echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart 
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>-->

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/dist/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/terbilang.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- Page script -->

<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('berita')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script> -->
<style type="text/css">
  @media (min-width: 480px) {
    .row-xs-table {
        display: table;
        table-layout: fixed;
        width: 100%;
        height: 100%;
    }
    .col-xs-table {
        display: table-cell;
        float: none;
        height: 100%;
    }
}

@media (min-width: 768px) {
    .row-sm-table {
        display: table;
        table-layout: fixed;
        width: 100%;
        height: 100%;
    }
    .col-sm-table {
        display: table-cell;
        float: none;
        height: 100%;
    }
}

@media (min-width: 992px) {
    .row-md-table {
        display: table;
        table-layout: fixed;
        width: 100%;
        height: 100%;
    }
    .col-md-table {
        display: table-cell;
        float: none;
        height: 100%;
    }
}

@media (min-width: 1200px) {
    .row-lg-table {
        display: table;
        table-layout: fixed;
        width: 100%;
        height: 100%;
    }
    .col-lg-table {
        display: table-cell;
        float: none;
        height: 100%;
    }
}
</style>
<script>
  $(document).ready(function(){ 

    //Initialize Select2 Elements
    $('.select2').select2()
    
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
     $('.tanggalan').daterangepicker({
        timePicker: false,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'DD.MM.YYYY'
        }
      });
     $('.datepicker').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy"
      })
    //Date range picker with time picker
  })
</script>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#prov").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Setting/get_kota"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_provinsi : $("#prov").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kota").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#kota").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Setting/get_kecamatan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_kota : $("#kota").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kecamatan").html(response.list_kec).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

  <script type="text/javascript">
  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>

<script type="text/javascript">
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>

<script type="text/javascript">
  function embuh(){
    var embuha = document.getElementById('kodeformat1').value;
    if(embuha=='huruf'){
    document.getElementById('texthuruf1').style.visibility='visible';
    // document.getElementById('texthuruf1').value = embuha;
    } else {
    document.getElementById('texthuruf1').style.visibility='hidden';

    }
  }

  function embuhb(){
    var embuhtext = document.getElementById('format2').value;
    if(embuhtext=='huruf'){
    document.getElementById('texthuruf2').style.visibility='visible';
    } else {
    document.getElementById('texthuruf2').style.visibility='hidden';

    }
  }

  function embuhc(){
    var embuhtext3 = document.getElementById('format3').value;
    if(embuhtext3=='huruf'){
    document.getElementById('texthuruf3').style.visibility='visible';  
    } else {
    document.getElementById('texthuruf3').style.visibility='hidden';   
    }
    // document.getElementById('texthuruf3').value=embuhtext3;
  }
  function embuhhub(){
      var a = document.getElementById('kodeformat1').value;
      var b = document.getElementById('format2').value;
      var c = document.getElementById('format3').value;
      var d = document.getElementById('penghubung').value;
      var e = document.getElementById('texthuruf1').value;
      var f = document.getElementById('texthuruf2').value;
      var g = document.getElementById('texthuruf2').value;
      if (a == "huruf"){
        var a = e;
      } 
      if (b == "huruf"){
        var b = f;
      } 
      if(c == "huruf"){
        var c = g;
      }
      document.getElementById('final').value = a+d+b+d+c;
    // var embuhhuba = document.getElementById('penghubung').value;
  // document.getElementById('final').value= a+b;
  }
</script>
  
<script type="text/javascript">
    
    var rupiah = document.getElementById('rupiah');
    if(rupiah){
      rupiah.addEventListener('keyup', function(e){
      //   // tambahkan 'Rp.' pada saat form di ketik
      //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
      });
    }

    var income = document.getElementById('income');
    if(income){
      income.addEventListener('keyup', function(e){
      //   // tambahkan 'Rp.' pada saat form di ketik
      //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        income.value = formatRupiah(this.value, 'Rp. ');
      });
    }

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
<!-- <script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
    function cek_nik(){
        $("#pesannik").hide();
        var nik = $("#nik").val();
        if(nik != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_User/cek_nik'; ?>", //arahkan pada proses_tambah di controller member
                data: 'nik='+nik,
                type: "POST",
                success: function(msg){
                  $("#nik").html(response.nika).show();
                  $("#nama").html(response.nama).show();
                  $("#alamat").html(response.alamat).show();
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        }                
    }
     
</script> -->
<script type="text/javascript">
function ValidateSize(file) {
    var FileSize = file.files[0].size / 1024 / 1024; // in MB
    if (FileSize > 2) {
        alert('Maaf File anda terlalu besar');
       $(file).val(''); //for clearing with Jquery
    } else {
      var inputFile = document.getElementById('image-file');
      var pathFile = inputFile.value;
      var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
      if(!ekstensiOk.exec(pathFile)){
          alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
          inputFile.value = '';
          return false;
      }
    }
}

</script>
<script>
  $(document).ready(function(){
  // $('#modaluploadbuktitransfer').hidden();
  $('#btnsimpantf').click(function(){ // Ketika tombol simpan di klik
    $.ajax({
      url: "<?php echo base_url("index.php/C_User/tambahtf"); ?>", // Isi dengan url/path file php yang dituju
      type: 'POST', // Tentukan type nya POST atau GET
      data: {
        input_gambar : $("#image-file").val(),
        id : $("#idang").val()}, // Ambil semua data yang ada didalam tag form
      dataType: 'json',
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType('application/jsoncharset=UTF-8')
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
          $('.close').click(); // Close / Tutup Modal Dialog
          // $("#tipeuser").html(response.list_tipeuser).show();
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText) // munculkan alert
      }
    })
  })
  $('#modaluploadbuktitransfer').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
    $('#modaluploadbuktitransfer input').val('') // Clear inputan menjadi kosong
  })
})
</script>

 <script>
     $(document).ready(function() {
         // Untuk sunting
         $('#edit-data').on('show.bs.modal', function (event) {
             var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
             var modal          = $(this);
             document.getElementById('level') = modal;
             // modal.find('#idgotaaa').attr("value",div.data('idgotaaa'));
             modal.find('#idgotaaa').attr("value",div.data('level'));
         });
     });
 </script>

<script>
  $(document).ready(function(){
  // $('#modaluploadbuktitransfer').hidden();
  $('#btnsimpantfupgrade').click(function(){ // Ketika tombol simpan di klik
    $.ajax({
      url: "<?php echo base_url("index.php/C_Donasi/upgrade"); ?>", // Isi dengan url/path file php yang dituju
      type: 'POST', // Tentukan type nya POST atau GET
      data: {
        input_gambar : $("#imagebt").val(),
        id : $("#upgrade").val()}, // Ambil semua data yang ada didalam tag form
      dataType: 'json',
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType('application/jsoncharset=UTF-8')
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
          $('.close').click(); // Close / Tutup Modal Dialog
          // $("#tipeuser").html(response.list_tipeuser).show();
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText) // munculkan alert
      }
    })
  })
  $('#modaluploadbuktitransfer').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
    $('#modaluploadbuktitransfer input').val('') // Clear inputan menjadi kosong
  })
})
</script>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#idanggota").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Donasi/getuserspek"); ?>", // Isi dengan url/path file php yang dituju
        data: {idanggota : $("#idanggota").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#nominal").html(response.nominal).show();
          $("#upline").html(response.upline).show();
          $("#level").html(response.level).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
</body>
</html>