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
  
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
				 <img src="<?php echo site_url('assets/images/logo.jpg') ?>" alt="Sistem Informasi Skripsi PNF">
				</div>
				
				<form class="login100-form validate-form" id="login-form" method="post" action="<?php echo base_url('Auth/login'); ?>">
					  <?php
                echo $this->session->flashdata('msg');
                ?>
              
					<span class="login100-form-title">
					 Sistem Informasi Skripsi
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Npm atau Nip tidak boleh kosong!">
						   <input class="input100" type="text" id="npm" name="username" maxlength="18" minlength="9" placeholder="Masukkan Npm / Nip">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Kata sandi tidak boleh kosong!">
						<input class="input100" type="password" name="password" placeholder="Kata Sandi">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" value="login">
							Masuk
						</button>
					</div>	
					<div class="container-login100-form-btn">
						               <a href="<?php echo base_url('Auth/daftar') ?>">
                                                <i class="icon icon-user-following"></i> Daftar
                                            </a>
					</div>					

					<?php if(validation_errors()): ?>
					
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
  keyup: function(){
   this.value = this.value.toUpperCase();
  },
  change: function() {
    this.value() = this.value.replace(/\s/g, "");
    
  }
});

</script>