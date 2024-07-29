<div class="col-md-4" id="bagas">
    <div class="card">

        <div class="card-header bg-primary">
          <b>Tambah Dosen</b>
        </div>

        <div class="card-body"> 
 <form action="" method="post">
          
                 <?php
                echo $this->session->flashdata('msg');
                ?>


               <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control" pattern="[^ 19]*19[^ 19]*[0-9]{16}" name="nip" id="nip"  maxlength="18" placeholder="Masukkan nip" required>
               
              </div>
              <div class="form-group">
                 <label>Nama</label>
                <input type="text" class="form-control"  name="nama_dosen" id="6"  placeholder="Masukkan nama" required>
               
              </div>
               <div class="form-group">
                 <label>Password</label>
                <input type="password" class="form-control" id="3" minlength="8" name="password" placeholder="Masukkan Password" required>
                
              </div>
               <div class="form-group">
                  <label>Konfirmasi Password</label>
                <input type="password" class="form-control" id="4" minlength="8"  placeholder="Masukkan Password" required>
               
              </div>
                   <div class="form-group">
                    <button type="submit" id="btnSubmit" name="btnlogin" class="btn btn-success btn-block">Tambah <i class="icon-circle-right2 position-right"></i></button>
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
        function isAcceptedUsername(nip) {
    var Regex = /[^ 19]*19[^ 19]*[0-9]{16}$/i ;
    return Regex.test(nip) ;
  }
  var nip = $("#nip").val();
             if (!isAcceptedUsername(nip)) {
    alert("Masukkan Nip dengan benar") ;
  }

            });
          });

    </script>