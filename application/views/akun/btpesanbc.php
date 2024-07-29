 <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('akun/editpesan'); ?>/<?php echo $id_pesan; ?>">
      </form>

   
      <div class="card">

        <div class="card-header bg-primary">
        	 <a class="btn btn-warning" 
    href="<?php echo base_url('akun/tbpesan'); ?>">
    <i class="fa fa-plus fa-share" aria-hidden="true"></i></a>

</a>
 <?php  $user = $this->session->userdata('username'); if($user== $pengirim){ ?>
                         <b>Pengirim : <?php  echo "$nama"; ?> <?php  echo "  ($pengirim)"; ?></b> 
                        <?php } elseif($user!=$penerima){?>
                    <b>Pengirim : <?php  echo "$this->session->userdata('nama')"; ?> <?php  echo "  ($penerima)"; ?></b> 
                  
                        <?php } ?>
         
        </div>
        <div class="card-body">   
        <div id="3" class="form-group">
        
     <p style=" text-align: justify-center; font-size: 30px;  "><?php  echo "$pesan"; ?></p>
        </div>
     
        </div>
    <div class="card-footer  bg-primary" id="asd">
        </div>
    </div>
<style type="text/css">#asd {
       margin-top: 30%;
}</style>