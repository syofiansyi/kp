
<div class="container">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <h3>Ubah Data Mahasiswa
      </h3>
      <hr>
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('akun/edit_dosen'); ?>/<?php echo $username; ?>">
        <div class="form-group">
          <label>Username:</label>
          <input type="text" class="form-control" value="<?php echo $username; ?>" name="username" >
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="text"  class="form-control" name="password" required>
        </div>
        <div class="form-group">
          <label>Username:</label>
          <input type="text"  class="form-control"  name="password2" >
        </div>
        
        <button type="submit"  class="btn btn-success">  <span class="glyphicon glyphicon-check"></span> Update</button>
      </form>
    </div>
  </div>
</div>

  