<div class="container" id="bagas">
  
<div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Ubah Password Dosen</b>
        </div>
        <div class="card-body">   
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('akun/edit_dosen'); ?>/<?php echo $nip; ?>">
        <div class="form-group">
          <label>Nip:</label>
          <input type="text" readonly="" class="form-control" value="<?php echo $nip; ?>" name="nip" >
        </div>
         <div class="form-group">
          <label>Nama:</label>
          <input type="text" readonly="" class="form-control" value="<?php echo $nama_dosen; ?>" name="nama_dosen" >
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password"  id="3" class="form-control"  name="password" required>
        </div>
        <div class="form-group">
          <label>Konfirmasi Password:</label>
          <input type="password" id="4"  class="form-control"   >
        </div>
      
          <div class="form-group">
                         <label>Jabatan:</label>
                         <?php $this->db->where('level', '2'); $this->db->from('dosen'); $hlev = $this->db->count_all_results();?>
                        <?php if($level =='2'){ ?>
                        <select name="level"  type="text"  class="form-control">
                           <option value="1">Staf</option>
                           <option value="2">Ketua Prodi</option>
                           </select>
                        <?php } elseif($hlev == '0'){?>
                   <select name="level"  type="text"  class="form-control">
                          <option value="1">Staf</option>
                           <option value="2">Ketua Prodi</option>
                           </select>
                      
                          <?php } elseif($hlev == '1'){?>
                   <select name="level"  type="text"  class="form-control">
                           <option value="1">Staf</option>
                           </select>
                        <?php } ?>

                         
                    </div>
        <div class="form-group">
                    <button type="submit" id="btnlogin" name="btnlogin" class="btn btn-success btn-block">Simpan <i class="icon-circle-right2 position-right"></i></button>
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
            $("#btnlogin").click(function () {
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

  