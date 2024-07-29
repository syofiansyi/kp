
<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Ubah Skripsi</b>
        </div>
        <div class="card-body">   
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('skripsi/etbskrip'); ?>/<?php echo $id_skripsi; ?>">
        <div class="form-group">
          <label>Npm:</label>
          <input type="text" class="form-control" value="<?php echo $npm; ?>" name="npm" readonly>
        </div>
        <div class="form-group">
          <label>Judul:</label>
         <textarea type="text" class="form-control" name="judul" rows="5"  placeholder="Masukkan judul skripsi" required> </textarea>
        </div>
        <div class="form-group">
          <input type="hidden" id=""  class="form-control"  name="id_skripsi"  value="<?php echo $id_skripsi; ?>" required>
        </div>
        <div class="form-group">
          <label>Jenis Skripsi:</label>
          <select name="jenis" type="text" id="jenis"  class="form-control"  required="Pilih Jenis Skripsi">
    <option value="kualitatif"> Kualitatif</option>
    <option value=kuantitatif>Kuantitatif</option>
  
  </select>
        </div>
         <div class="form-group">
          <label>Lokasi Penelitian:</label>
          <input type="text" id="" class="form-control" value="<?php echo $lokasi; ?>"  name="lokasi" required="">
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
 