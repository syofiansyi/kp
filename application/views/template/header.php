<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $pageTitle; ?> | SISKRIP</title>
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.png') ?>"/>

        <!-- CSS  -->
        <link href="<?php echo base_url('assets/vendor/simple-line-icons/css/simple-line-icons.css'); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url('assets/vendor/font-awesome/css/fontawesome-all.min.css'); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url('assets/vendor/datatables/datatables.css'); ?>" rel="stylesheet">

        <!-- JS  -->
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>        
        <script src="<?php echo base_url('assets/vendor/popper.js/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>                     
        <script src="<?php echo base_url('assets/vendor/datatables/datatables.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/mask/jquery.mask.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/mask/jquery.maskMoney.min.js'); ?>"></script>

    </head>
   <body class="sidebar-fixed header-fixed">
     <div class="form-group">
         <!--  -->
               
                
                
        <div class="page-wrapper">
            <nav class="navbar page-header">
                <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
                    <i class="fa fa-bars"></i>
                </a>

                

                <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
                    <i class="fa fa-bars"></i>
                </a>

                <ul class="navbar-nav ml-auto">                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-danger"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php
 $user = $this->session->userdata('username');
  $this->db->where('penerima', $user);
                $this->db->where('status', 'terkirim');
$this->db->from('pesan');
echo $this->db->count_all_results(); // Produces an integer, like 17 ?>
                          <img src="<?php echo base_url('assets/images/noavatar.png'); ?>" class="avatar avatar-sm" alt="logo">
                            <span class="small ml-1 d-md-down-none text-danger"><?php echo $this->session->userdata('akses')." ".$this->session->userdata('nama'); ?></span>
                          
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">   
 <a href="<?php echo base_url('akun/pesanbc'); ?>" class="dropdown-item text-danger " >
                             <?php
 $user = $this->session->userdata('username');
  $this->db->where('penerima', $user);
                $this->db->where('status', 'terkirim');
$this->db->from('pesan');
echo $this->db->count_all_results(); // Produces an integer, like 17 ?> <i class="fa fa-envelope"></i> <b class="text-dark">Pesan</b>

                            </a>
                         
                            <?php if($this->session->userdata('akses') === 'dosen'): ?>    
                             <a href="<?php echo base_url('akun/ubah_passwordd'); ?>/<?php echo $this->session->userdata('username'); ?>" class="dropdown-item">
                                <i class="fa fa-key"></i> <b class="text-dark">Ubah Password</b>
                            </a>
                            <?php endif; ?>
                            <?php if($this->session->userdata('akses') === 'operator'): ?>    
                             <a href="<?php echo base_url('akun/ubah_passwordo'); ?>/<?php echo $this->session->userdata('username'); ?>" class="dropdown-item">
                                <i class="fa fa-key"></i> <b class="text-dark">Ubah Password</b>
                            </a>
                            <?php endif; ?>
                             <?php if($this->session->userdata('akses') === 'mahasiswa'): ?>    
                             <a href="<?php echo base_url('akun/ubah_passwordm'); ?>/<?php echo $this->session->userdata('username'); ?>" class="dropdown-item">
                               <i class="fa fa-key"></i> <b class="text-dark">Ubah Password</b>
                            </a>
                            <?php endif; ?>
                             <a href="<?php echo site_url('Auth/logout'); ?>" class="dropdown-item">
                               <i class="fa fa-lock"></i> <b class="text-dark">Keluar</b>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <style type="text/css">#ty{
    
colo: green;
</style>