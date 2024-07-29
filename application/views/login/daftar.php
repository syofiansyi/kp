<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIKRIP</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.png') ?>"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
<!--===============================================================================================-->
</head>
<body>

    <div class="container-login100" id="bagas">
      <div class="wrap-login100">
        
       
       <form class="col-sm-20" id="login-form"  action="<?=base_url('Auth/daftar') ?>" method="post" enctype="multipart/form-data">

          <?php
                echo $this->session->flashdata('msg');
                ?>
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
   
          
        

          <div class="row" id="row">
        
                        <div class="col-md-6">
<div class="form-group">
  
  <label>Npm</label>
          <div class="wrap-input100 validate-input" data-validate = "Username pengguna tidak boleh kosong!">
            
            <input class="input100" type="text" id="npm" name="npm" required="" pattern="[^ A1J]*A1J[^ A1J]*[0-9]{6}" minlength="9" maxlength="9" placeholder="Npm ">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>
         </div>
       </div>
       <div class="col-md-6">
<div class="form-group">
  <label>Nama</label>
          <div class="wrap-input100 validate-input" data-validate = "Nama pengguna tidak boleh kosong!">
           
            <input class="input100" type="text" id="6" name="nama_mhs" required="" placeholder="Nama Pengguna">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
               <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label>Password</label>
          <div class="wrap-input100 validate-input" data-validate = "Kata sandi tidak boleh kosong!">
          
            <input class="input100" type="password" id="pas1" minlength="8" required="" name="password" placeholder="Kata Sandi">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
  <label>Konfirmasi Password</label>
          <div class="wrap-input100 validate-input" data-validate = "Kata sandi tidak boleh kosong!">
         
            <input class="input100" type="password" minlength="8" name="password2" required="" id="pas2" placeholder=" Konfirmasi Kata Sandi">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
        </div></div>
        <div class="col-md-6">
        <div class="form-group">
  <label>Matakuliah Prasyarat</label>
          <div class="wrap-input100 validate-input" data-validate = "Mata Kuliah Prasyarat tidak boleh kosong!">

            <input class="input100 " id="mp"  class="form-control" type="file" required="" name="matkul_metopen" placeholder="Mata Kuliah Prasyarat">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-book" aria-hidden="true"></i>
            </span>
          </div></div>
          </div>
        </div>
           <div class="col-md-6" id="btn">
        <div class="form-group">
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" id="btnsumbit" name="btnlogin" >
              Daftar
            </button>
          </div>          </div>
          <div class="container-login100-form-btn">
               <a href="<?php echo base_url('Auth/login') ?>">
                                                <i class="icon icon-user-following"></i> Kembali
                                            </a>
          </div>  
          <?php if(validation_errors()): ?>
          <div class="text-center p-t-12">
            <span class="txt2">
              <?php echo validation_errors('<p>', '</p>'); ?>
            </span>           
          </div>
          <?php endif; ?>         

        </form>
      </div>
    </div>
  </div>
 
<!--===============================================================================================-->  
  <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/popper.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('assets/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('assets/vendor/tilt/tilt.jquery.min.js') ?>"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('assets/js/main.js') ?>"></script>

</body>
</html>
    <script type="text/javascript">

  $("#npm").on({

 // keydown: function(e) {
 //   if (e.which === 8 ) 
 //     return false;
 //  },
 //   keypress: function(e) {
 //   if (e.which === 32)
 //     return false;
  // },
  keyup: function(){
   this.value = this.value.toUpperCase();
  },
  change: function() {
    this.value() = this.value.replace(/\s/g, "");
    
  }
});

</script>
<style type="text/css">

#row{margin-left: 10%;
margin-right:10%; }
#btn{margin-left: 25%;
margin-right:40%; }
#sd{margin-left: 30%;
margin-right:40%; }


</style>
<script type="text/javascript">
        $(function () {
           
    $("input[name=npm]")[0].oninvalid = function () {
        // this.setCustomValidity(" Masukan Npm dengan Benar.");
        alert("Masukan Npm Dengan Benar");
        
    };
    $(("input[name=password]")&&("input[name=password2]") && ("input[name=matkul_metopen]"))[0].oninvalid = function () {
        // this.setCustomValidity(" Password tidak boleh kosong.");
        alert("Data tidak boleh kosong.");
        
    };
     $("#mp").click(function () {
                var password = $("#pas1").val();
                var pas2 = $("#pas2").val();
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
   