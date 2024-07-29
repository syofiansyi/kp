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


<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Verifikasi Akun</b>
        </div>
  <div class="card-body">            
            <div class="table-responsive">
     
              <a class="btn btn-primary"
    href="<?php echo base_url('akun/tambah_mhs'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i></a>
             <a class="btn btn-success"
    href="<?php echo base_url('akun/aktifasi_akun'); ?>">
     <b>Akun Teraktifasi</b> 

</a>
</div>
</div>
 

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Npm</th>
                            <th>Nama Mahasiswa</th>
                             <th>Matkul</th>
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($biodata as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                           

                   <td><a href="<?php echo base_url('/gambar/'.$row->matkul_metopen) ?> "  target="_blank" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="lihat">Lihat</a></td>
<td>
                                <a href="<?php echo base_url('akun/delete_mahasiswa'); ?>/<?php echo $row->npm; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="hapus" onclick="return confirm('Yakin mau menghapus ini ?')" ><i class="fa fa-window-close"></i></a>
                               
                               <a href="<?php echo base_url('akun/aktifasi'); ?>/<?php echo $row->npm; ?>" class="btn btn-primary"><i class="fa fa-check"></i></a>
                               
                            </td>
                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>


