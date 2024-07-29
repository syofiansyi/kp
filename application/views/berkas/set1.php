
<div class="container">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <h3>Ubah Data Mahasiswa
      </h3>
      <hr>
      <?php extract($semprop); ?>
      <form method="POST" action="<?php echo base_url('data/set1'); ?>/">
        
        <div class="form-group">
          <label>Password:</label>
          <input type="text"  class="form-control" name="judul" required>
        </div>
        <div class="form-group">
          <label>Username:</label>
          <input type="text"  class="form-control"  name="jenis_skripsi" >
        </div>
        
        <button type="submit"  class="btn btn-success">  <span class="glyphicon glyphicon-check"></span> Update</button>
      </form>
    </div>
  </div>
</div>

  