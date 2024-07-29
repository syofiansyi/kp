
<div class="container">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <h3>Ubah Data Mahasiswa
      </h3>
      <hr>
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('nilai/status_gagal'); ?>/<?php echo $id_bimbing; ?>">
        <button type="submit"  class="btn btn-success">  <span class="glyphicon glyphicon-check"></span> Update</button>
      </form>
    </div>
  </div>
</div>

  