<?php
if ($this->session->flashdata('tambah_mahasiswa')) {
    ?>
    <div class="col-md-12">
    <div class="bg-success pesan">
        <?php echo $this->session->flashdata('tambah_mahasiswa'); ?>
    </div>
     </div>
    <?php
}

if ($this->session->flashdata('edit_mahasiswa')) {
    ?>
    <div class="col-md-12">

    <div class="bg-primary pesan">
        <?php echo $this->session->flashdata('edit_mahasiswa'); ?>
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
        <div class="card-header bg-light">
           Akun
        </div>
  <div class="card-body">            
            <div class="table-responsive">
              <a class="btn btn-primary"
    href="<?php echo base_url('skripsi/tambah_mhs'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah
</a>
</div>
</div>

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul Skripsi</th>
                            <th>Jenis Skripsi</th>
                            <th>Lokasi Penelitian</th>
                            <th>Bukti Bimbingan</th>

                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                     
                       
                        <?php $no = 0; foreach($sidang as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                            <td><?php echo $row->judul; ?></td>
                            <td><?php echo $row->jenis_skripsi; ?></td>
                            <td><?php echo $row->lokasi; ?></td>
                            <td><?php echo $row->kb_sidang; ?></td>
                           
                            <td>

                                <a href="<?php echo base_url('skripsi/delete_mahasiswa'); ?>/<?php echo $row->npm; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-eraser"></i></a>
                               
                               <a href="<?php echo base_url('skripsi/edit_mahasiswa'); ?>/<?php echo $row->npm; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                               
                            </td>
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>



