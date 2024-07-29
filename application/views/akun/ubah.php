<?php
if ($this->session->flashdata('sukses')) {
    ?>
    <div class="col-md-12">
    <div class="bg-success pesan">
        <?php echo $this->session->flashdata('sukses'); ?>
    </div>
     </div>
    <?php
}

if ($this->session->flashdata('gagal')) {
    ?>
 <div >

    <div >
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

<div class="container" id="bagas">
<div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b> Matakuliah Metode Penelitian</b>
        </div>
        <div class="card-body">   
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('akun/ubah_matkul'); ?>/<?php echo $npm; ?>"enctype="multipart/form-data">
        
         <div class="form-group">
          <label>NPM:</label>
          <input type="text"  class="form-control" name="npm" value="<?php echo $npm; ?>" readonly required>
        </div>
        
        
         <div class="form-group">
          <label>Matkul Metopen:</label>
          <input type="file"  class="form-control" name="matkul_metopen" required>
        </div>
        
        
        <button type="submit" name="btnlogin" class="btn btn-success btn-block" >simpan <i class="icon-circle-right2 position-right"></i></button>
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