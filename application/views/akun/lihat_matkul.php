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
<div class="row" style="margin-left: auto; " >
 
      <div class="card" >

        <div class="card-header bg-primary" >
          <b>Mata Kuliah Metode Penelitian</b>
        </div>
<div class="card-body">  <a href="<?php echo base_url('akun/ubah_matkul'); ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="ubah"><i class="fa fa-edit"></i> </a></div>
        <div class="card-body">  
       <embed width="100%" height="500" style="display: block; margin: auto;" src="<?php echo base_url('/gambar/'.$operator->matkul_metopen) ?>" /></embed>
   
    </div>
     <div class="card-footer">  </div>
  </div>
</div>
  
