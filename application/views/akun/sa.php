
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
           <b>Akun Teraktifasi</b>
        </div>
 

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Npm</th>
                            <th>Password</th>
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                          <?php $no = 0;   foreach($mahasiswa->result()as $row){ ?>
                
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td><?php echo $row->password2; ?></td>
                           
                            <td>
                                <a href="<?php echo base_url('akun/delete_mahasiswa'); ?>/<?php echo $row->npm; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-eraser"></i></a>
                               
                               <a href="<?php echo base_url('akun/edit_aktifasi'); ?>/<?php echo $row->npm; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                               
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



