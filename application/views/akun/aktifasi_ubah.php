
<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Ubah Password</b>
        </div>
        <div class="card-body">   
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('akun/edit_aktifasi'); ?>/<?php echo $npm; ?>">
        <div class="form-group">
          <label>Npm:</label>
          <input type="text" readonly="" class="form-control" value="<?php echo $npm; ?>" name="npm" >
        </div>
        <div class="form-group">
          <label>Npm:</label>
          <input type="text" readonly="" class="form-control" value="<?php echo $nama_mhs; ?>" name="nama_mhs" >
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password" id="3"  class="form-control"  name="password" required>
        </div>
        <div class="form-group">
          <label>Konfirmasi Password:</label>
          <input type="password" id="4" class="form-control"   >
        </div>
        <div class="form-group">
                    <button type="submit" id="btnSubmit"  class="btn btn-success btn-block">Simpan <i class="icon-circle-right2 position-right"></i></button>
                  </div>
      </form>
    </div>
  </div>
</div>

<style type="text/css">
 #bagas {
    
    width: 100%;
    margin-right: 30%;
    margin-left: 30%;
}
</style>

  <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#3").val();
                var pas2 = $("#4").val();
                if (password != pas2) {
                    alert("Data yang dinput tidak sama");
                    return false;
                }
                return true;

            });
        });
    </script>
  