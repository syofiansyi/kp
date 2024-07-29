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

 ?>
        <div class="card-header bg-primary">
           <b>Dosen Penguji</b>
        </div>
        <div class="card-body">  
<div class="dropdown show">
  <a class="btn btn-succes dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
  Pilih
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="penguji">Semprop</a>
    <a class="dropdown-item" href="penguji_semhas">Semhas</a>
    <a class="dropdown-item" href="penguji_sidang">Sidang</a>
  </div> 
    

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Npm</th>
                             <th>Penguji Utama</th>
                             <th>Penguji Pendamping</th>
                          
                             
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($dpenh as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                             <td><?php echo $row->npm; ?></td>
                               <td><?php echo $row->nama_pg1; ?></td>
                                 <td><?php echo $row->nama_pg2; ?></td>
                             
                            
                           
                            <td>

                              
                                <a href="<?php echo base_url('Stsdosen/edit_penguji_semhas'); ?>/<?php echo  $row->id_semhas; ?>"class="btn btn-success"><i class="fa fa-edit"></i></a>
                               
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

              ?>
        <div class="card-header bg-primary">
           <b>Dosen Penguji</b>
        </div>
        <div class="card-body">  
<div class="dropdown show">
  <a class="btn btn-succes dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
  Pilih
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="penguji">Semprop</a>
    <a class="dropdown-item" href="penguji_semhas">Semhas</a>
    <a class="dropdown-item" href="penguji_sidang">Sidang</a>
  </div> 
    

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Npm</th>
                             <th>Penguji Utama</th>
                             <th>Penguji Pendamping</th>
                          
                             
                                             
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($dosen as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                             <td><?php echo $row->npm; ?></td>
                               <td><?php echo $row->nama_pg1; ?></td>
                                 <td><?php echo $row->nama_pg2; ?></td>
                             
                            
                           
                            
                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
 <?php endif; ?>
