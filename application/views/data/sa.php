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
           <b>Data Skripsi</b>
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
                            
                                            
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0;   foreach($mahasiswa->result()as $row){ ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                            <td><?php echo $row->judul; ?></td>
                            <td><?php echo $row->jenis; ?></td>
                            <td><?php echo $row->lokasi; ?></td>
                          
                           
                              
                               
                            </td>
                        </tr>
                          <?php
                                        }
                                        ?>
                        
                       
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>



