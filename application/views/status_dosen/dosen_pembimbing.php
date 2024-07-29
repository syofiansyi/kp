<?php
if ($this->session->flashdata('berhasil')) {
    ?>
    <div class="col-md-12">
    <div class="bg-success pesan">
        <?php echo $this->session->flashdata('berhasil'); ?>
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
 
if ($this->session->flashdata('delete_mahasiswa')) {
    ?>
    <div class="bg-success pesan">
        <?php echo $this->session->flashdata('delete_mahasiswa'); ?>
    </div>
    <?php
}

?>

 <?php if ($this->session->userdata('akses') === 'operator'):  ?>

<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Dosen Pembimbing</b>
        </div><div class="card-body">            
            <div class="table-responsive">
     
            

</div>
</div>
 

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Npm</th>
                             <th>Pembimbing Utama</th>
                             <th>Pembimbing Pendamping</th>
                        
                             
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($dpem as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                             <td><?php echo $row->npm; ?></td>
                               <td><?php echo $row->nama_pb1; ?></td>
                                 <td><?php echo $row->nama_pb2; ?></td>
                                  
                             
                            
                           
                            <td>

                               
                                 <a href="<?php echo base_url('Stsdosen/edit_pembimbing'); ?>/<?php echo  $row->id_bimbing; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                               
                            </td>
                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
    <?php endif; ?>
 <?php if ($this->session->userdata('akses') === 'dosen'):  ?>
<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Dosen Pembimbing</b>
        </div><div class="card-body">            
            <div class="table-responsive">
     
            

</div>
</div>
 

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Npm</th>
                             <th>Pembimbing Utama</th>
                             <th>Pembimbing Pendamping</th>
                        
                             
                                             
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($dpem2 as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                             <td><?php echo $row->npm; ?></td>
                               <td><?php echo $row->nama_pb1; ?></td>
                                 <td><?php echo $row->nama_pb2; ?></td>
                                  
                             
                            
                           
                           
                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>

 <?php endif; ?>


  <?php if ($this->session->userdata('akses') === 'mahasiswa'):  ?>
<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Dosen Pembimbing</b>
        </div><div class="card-body">            
            <div class="table-responsive">
     
            

</div>
</div>
 

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Npm</th>
                             <th>Pembimbing Utama</th>
                             <th>Pembimbing Pendamping</th>
                        
                             
                                             
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($dpem1 as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                             <td><?php echo $row->npm; ?></td>
                               <td><?php echo $row->nama_pb1; ?></td>
                                 <td><?php echo $row->nama_pb2; ?></td>
                                  
                             
                            
                           
                           
                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>

 <?php endif; ?>