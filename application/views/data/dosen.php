<?php
if ($this->session->flashdata('tambah_dosen')) {
    ?>
    <div class="col-md-12">
    <div class="bg-success pesan">
        <?php echo $this->session->flashdata('tambah_dosen'); ?>
    </div>
     </div>
    <?php
}

if ($this->session->flashdata('edit_dosen')) {
    ?>
    <div class="col-md-12">

    <div class="bg-primary pesan">
        <?php echo $this->session->flashdata('edit_dosen'); ?>
    </div>
    </div>
    <?php
}
 
if ($this->session->flashdata('delete_dosen')) {
    ?>
    <div class="bg-success pesan">
        <?php echo $this->session->flashdata('delete_dosen'); ?>
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
    href="<?php echo base_url('akun/tambah_dosen'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah
</a>
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                             
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                     
                       
                        <?php $no = 0; foreach($biodata as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->username; ?></td>
                            <td><?php echo $row->password2; ?></td>
                           
                            <td>

                                <a href="<?php echo base_url('akun/delete_dosen'); ?>/<?php echo $row->username; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-eraser"></i></a>
                               
                               <a href="<?php echo base_url('akun/edit_dosen'); ?>/<?php echo $row->username; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                               
                            </td>
                        </tr>
                        <?php endforeach; ?>
                      
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>



