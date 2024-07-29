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
        <div class="card-header bg-primary">
           <b>Jadwal Seminar Proposal</b>
        </div>
        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Npm</th>
                            <th>Tanggal</th>
                             <th>Pukul</th>
                             <th>Ruang</th>
                             
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($Jdsemprop as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                             <td><?php echo $row->npm; ?></td>
                              <td><div><?php echo $row->tanggal;?></td>
                                  <td><div><?php echo $row->pukul;?></td>
                                      <td><div><?php echo $row->ruang;?></td>
                            
                           
                            <td>

                                <a href="<?php echo base_url('akun/delete_mahasiswa'); ?>/<?php echo $row->npm; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="selesai"><i class="fa fa-eraser"></i></a>
                               
                               
                            </td>
                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>


