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
    <div class="col-md-12">

    <div class="bg-primary pesan">
        <?php echo $this->session->flashdata('gagal'); ?>
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
        <div class="card-header bg-primary">
          <b> Akun Dosen </b>
        </div>

        <div class="card-body">            
            <div class="table-responsive">
                <a class="btn btn-primary"
    href="<?php echo base_url('akun/tambah_dosen'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> 
</a>
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama Dosen</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                    
                       
                        <?php $no = 0; foreach($biodata as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nip; ?></td>
                            <td><?php echo $row->nama_dosen; ?></td>
                            </td>
                           <?php if($row->level== '2'){ ?>
                         <td><?php echo 'Ketua Prodi';?></td>
                            
                        <?php } elseif($row->level=='1'){?>
                    <td><?php echo 'Staf'?></td>
                         
                  
                        <?php } ?>
                           
                            <td>

                                <a href="<?php echo base_url('akun/delete_dosen'); ?>/<?php echo $row->nip; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" onclick="return confirm('Yakin mau menghapus ini ?')" title="hapus"><i class="fa fa-eraser"></i></a>
                               
                               <a href="<?php echo base_url('akun/edit_dosen'); ?>/<?php echo $row->nip; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                               
                            
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>



