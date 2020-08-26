
<div class="modal fade" id="modaluploadbuktitransfer">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Bukti Transfer</h4>
      </div>
      <div class="modal-body">
        <input type="file" id="image-file" class="demoInputBox" name="input_gambar" required onchange="ValidateSize(this)">
        <?php foreach ($user as $key) { ?>
        <input type="text" class="form-control" id="idang" name="id_anggota" value="<?php echo $key->id_anggota ?>">
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsimpantf" >Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>