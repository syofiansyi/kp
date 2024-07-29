<?php

if ($this->session->flashdata('berhasil')) {
    ?>
    <div class="col-md-12">
    <div class="bg-success pesan">
        <?php echo $this->session->flashdata('berhasil'); ?>
    </div>
     </div>
    <?php
}

if ($this->session->flashdata('gagal')) {
    ?>
    <div class="col-md-12">

    <div class="bg-primary pesan">
        <?php echo $this->session->flashdata('gagal'); ?>
    </div>
    </div>
    <?php
}
 
if ($this->session->flashdata('delete_mahasiswa')) {
    ?>
    <div class="bg-success pesan">
        <?php echo $this->session->flashdata('delete_mahasiswa'); ?>
    </div>
    <?php
}

?>


 <div class="col-md-4" style="image-orientation:from-image; margin-right: 30%; margin-left: 30%;
   width:100%" >
    <div class="card">

        <div class="card-header bg-primary">
          <b>Tambah Mahasiswa</b>
        </div>

        <div class="card-body">            
 <?php
                echo $this->session->flashdata('msg');
                ?>
 <form action="<?=base_url('akun/tambah_mhs') ?>" method="post" enctype="multipart/form-data">
              <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
              
               
              </div>
             
              <div class="form-group">
              	  <label>Npm:</label>
                <input type="text" id="npm" class="form-control" 
                name="npm" pattern="[^ A1J]*A1J[^ A1J]*[0-9]{6}" minlength="9" maxlength="9" required>

              </div>
               <div class="form-group">
                  <label>Nama Mahasiswa:</label>
                <input type="text" id="6" class="form-control" name="nama_mhs" id="nama" 
                placeholder="Masukan Nama Anda">

              </div>
             <div class="form-group">
             	  <label>Password:</label>
                <input type="password" class="form-control" id="3" name="password" minlength="8" placeholder="Masukkan Password" required>

              </div>
                  <div class="form-group">
                  <label>Konfirmasi Password:</label>
                <input type="password" class="form-control" id="4" name="password2" minlength="8" placeholder="Masukkan Password" required>
              </div>
               <div class="form-group">
               <label>KRS Matakuliah Syarat:</label>
                <input type="file" class="form-control" id="5" name="matkul_metopen" placeholder="Konfirmasi Password" required>
              </div>
                 
                  <div class="form-group">
                    <button type="submit" name="btnlogin" id="btnSubmit" class="btn btn-success btn-block">Simpan <i class="icon-circle-right2 position-right"></i></button>
                  </div>

</div>

             

            </div>
          </form>
        </div>
      </div>

<script type="text/javascript">

  $("#form-input").on({

  keyup: function(){
   this.value = this.value.toUpperCase();
  },
  change: function() {
    this.value() = this.value.replace(/\s/g, "");
    
  }
});

</script>
<style type="text/css">
 #bagas {
    
    width: 100%;
    margin-right: 30%;
    margin-left: 30%;
}
</style>
<script type="text/javascript">
        $(function () {
              
     $("#5").click(function () {
                var password = $("#3").val();
                var pas2 = $("#4").val();
                if (password != pas2) {
                    alert("Password yang dinput tidak sama");
                    return false;
                }
                return true;

            });
         $("#6").click(function () {
        function isAcceptedUsername(npm) {
		var Regex = /[^ A1J]*A1J[^ A1J]*[0-9]{6}$/i ;
		return Regex.test(npm) ;
	}
	var npm = $("#npm").val();
             if (!isAcceptedUsername(npm)) {
		alert("Masukkan Npm dengan benar") ;
	}

            });
          });

    </script>
    <script type="text/javascript">

  $("#npm").on({
  keyup: function(){
   this.value = this.value.toUpperCase();
  },
  change: function() {
    this.value() = this.value.replace(/\s/g, "");
    
  }
});

</script>