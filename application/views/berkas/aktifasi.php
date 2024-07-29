
<div class="container " id="bagas">
  
  <div class="row" >
     <div class="card">

        <div class="card-header bg-primary">
          <b>Aktifasi Akun</b>
        </div>
        <div class="card-body">        
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('berkas/sel'); ?>/<?php echo $npm; ?>">
        <div class="form-group">
          <label>Npm:</label>
          <input type="text" class="form-control" value="<?php echo $npm; ?>" name="npm" readonly >
        </div>
       
       
         <div class="form-group">
                    <button type="submit"  class="btn btn-success btn-block">Aktifasi <i class="icon-circle-right2 position-right"></i></button>
                  </div>
      </form>
    </div>
  </div>
</div>
</div>
  </script>

<style type="text/css">
 #bagas {
    
    width: 100%;
    margin-right: 30%;
    margin-left: 30%;
}
</style>