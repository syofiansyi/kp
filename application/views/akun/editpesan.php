 <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('akun/editpesan'); ?>/<?php echo $id_pesan; ?>">
      </form>

   
      <div class="card">

        <div class="card-header bg-primary">
        	 <a class="btn btn-warning" 
    href="<?php echo base_url('akun/tbpesan'); ?>">
    <i class="fa fa-plus fa-share" aria-hidden="true"></i></a>

</a>
 <?php  $user = $this->session->userdata('username'); ?>
                      <b>Pengirim : <?php  echo "$nama"; ?> <?php  echo "  ($pengirim)"; ?></b> 
                  
                       
         
        </div>
        <div class="card-body">   
        <div id="3" class="form-group">
           <?php if($doc==null) { ?>
                     
                        <?php } elseif($doc!=null){?>
                    <embed width="100%" height="500" style="display: block; margin: auto;" src="<?php echo base_url('/gambar/'.$doc) ?>" /></embed>
         <br><br>
                  
                        <?php } ?>
                        
                        <p style=" text-indent: 0.5in; text-align: justify-center; font-size: 30px;  "><?php  echo "$pesan"; ?></p>
         
        </div>
   
        </div>
    <div class="card-footer  bg-primary" id="asd">
        </div>
    </div>
<style type="text/css">#asd {
       margin-top: 30%;
}</style>