
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


<?php if($this->session->userdata('akses') === 'dosen'): ?>
<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Nilai Seminar Proposal</b>
        </div>
  <div class="card-body">            
            <div class="table-responsive">
     
             <!--  <a class="btn btn-primary"
    href="<?php echo base_url('nilai/tbsempnilai'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i></a> -->
</div>
</div>

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                           
                            <th>Npm</th>
                            
                               <th>Indeks</th>
                              <th>Angka</th>
                             <th>Status Input</th> 
                            
                              <th>Input Nilai</th> 
                                <th>Status Seminar</th>     
                                   
                                             
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($result1 as $row): ?>
                        <tr>
                         
                          <?php if($row->status1 === 'gagal'): ?>
                            <td><?php echo ++$no; ?></td>
                           
                             <td><?php echo $row->npm; ?></td>
                             
                               
                                
                                   <td>
 <?php

 

    $hasil = ($row->nilai_kualitas1 + $row->nilai_kuantitas1 +$row->nilai_kualitas2 + $row->nilai_kuantitas2 + $row->nilai_kualitas3 + $row->nilai_kuantitas3 + $row->nilai_kualitas4 + $row->nilai_kuantitas4 + ($row->nilai_bimbingan1 )  + $row->nilai_bimbingan2 )/10;
      
 if ($hasil>=4)
 echo("<b>A</b>");
 elseif ($hasil>=3.85)
 echo("<b>A</b>");
elseif ($hasil>=3.75)
 echo("<b>A-</b>");
elseif ($hasil>=3.65)
 echo("<b>A-</b>");
 elseif ($hasil>=3.5)
 echo("<b>B+</b>");
elseif ($hasil>=3.33)
 echo("<b>B+</b>");
 elseif ($hasil>=3)
 echo("<b>B</b>");
elseif ($hasil>=2.85)
 echo("<b>B</b>");
elseif ($hasil>=2.75)
 echo("<b>B-</b>");
elseif ($hasil>=3.65)
 echo("<b>B-</b>");
elseif ($hasil>=2.5)
 echo("<b>C+</b>");
elseif ($hasil>=2.25)
 echo("<b>C+</b>");
elseif ($hasil>=2)
 echo("<b>C</b>");
elseif ($hasil>=1.5)
 echo("<b>C</b>");
elseif ($hasil>=1)
 echo("<b>D</b>");
 else
 echo("<b>E</b>");
?></td>
   <td>
 <?php

 

    $mutu = ($row->nilai_kualitas1 + $row->nilai_kuantitas1 +$row->nilai_kualitas2 + $row->nilai_kuantitas2 + $row->nilai_kualitas3 + $row->nilai_kuantitas3 + $row->nilai_kualitas4 + $row->nilai_kuantitas4 + ($row->nilai_bimbingan1 )  + $row->nilai_bimbingan2  )/10;
  
 echo($mutu);
?></td>

                            <td>  
 <?php if($row->nilai_bimbingan1 == null  || $row->nilai_bimbingan2 == null || $row->nilai_kuantitas1 == null || $row->nilai_kuantitas2 == null || $row->nilai_kuantitas3 == null || $row->nilai_kuantitas4 == null || $row->nilai_kualitas1 == null || $row->nilai_kualitas2 == null || $row->nilai_kualitas3 == null || $row->nilai_kualitas4 == null){ ?>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-minus-circle">Belum Lengkap</i>&nbsp; </button>
                        <?php } elseif($row->nilai_bimbingan1 != null  && $row->nilai_bimbingan2 != null && $row->nilai_kuantitas1 != null && $row->nilai_kuantitas2 != null && $row->nilai_kuantitas3 != null && $row->nilai_kuantitas4 != null && $row->nilai_kualitas1 != null && $row->nilai_kualitas2 != null && $row->nilai_kualitas3 != null && $row->nilai_kualitas4 != null && $mutu<=1.9){?>
                     <a href="<?php echo base_url('nilai/status_gagal');?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-check">Nilai Lengkap</i></a>
                         <?php } elseif($row->nilai_bimbingan1 != null  && $row->nilai_bimbingan2 != null && $row->nilai_kuantitas1 != null && $row->nilai_kuantitas2 != null && $row->nilai_kuantitas3 != null && $row->nilai_kuantitas4 != null && $row->nilai_kualitas1 != null && $row->nilai_kualitas2 != null && $row->nilai_kualitas3 != null && $row->nilai_kualitas4 != null && $mutu>=2){?>
                   <a href="<?php echo base_url('nilai/status_lulus'); ?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-check">Nilai Lengkap</i></a>
                  
                        <?php } ?>
                          </td>
                                        
                            <!--  <td><?php echo $row->status1; ?></td> -->
                              <td>  <?php   $data = $this->session->userdata('username'); ?>
 <?php if(($row->status1== 'lulus') || ($row->status1== 'gagal') ){ ?>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-minus-circle">Selesai</i>&nbsp; </button>
                        <?php } elseif($row->pg2== $data){?>
                     <a href="<?php echo base_url('nilai/pg2');?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-check">Penguji Pendamping</i></a>
                      <?php } elseif($row->pg1== $data){?>
                     <a href="<?php echo base_url('nilai/pg1');?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-check">Penguji Utama</i></a>
                      <?php } elseif($row->pb1== $data){?>
                     <a href="<?php echo base_url('nilai/pb1');?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-check">Pembimbing Utama</i></a>
                      <?php } elseif($row->pb2== $data){?>
                     <a href="<?php echo base_url('nilai/pb2');?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-check">Pembimbing Pendamping</i></a>
                         <?php } elseif(($row->pg1!= $data)||($row->pg2!= $data) || ($row->pb1!= $data)||($row->pb2!= $data)){?>
                   <a class="btn btn-success"><i class="fa fa-check">Bukan Penguji</i></a>
                  
                        <?php } ?>
                          </td>
                           
                           
                             <td><?php echo $row->status1; ?></td>

                        </tr>
                         <?php endif; ?> 
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
 <?php endif; ?> 
<?php if($this->session->userdata('akses') === 'operator'): ?>

<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Nilai Seminar Proposal</b>
        </div>
  <div class="card-body">            
            <div class="table-responsive">
     
             <!--  <a class="btn btn-primary"
    href="<?php echo base_url('nilai/tbsempnilai'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i></a> -->
</div>
</div>

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                           
                            <th>Npm</th>
                            
                               <th>Indeks</th>
                              <th>Angka</th>
                             <th>Status Input</th> 
                            <th>Status Seminar</th>      
                             
                               <th>Aksi</th>       
                                             
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($result as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                           
                             <td><?php echo $row->npm; ?></td>
                             
                               
                                
                                   <td>
 <?php

 

    $hasil = ($row->nilai_kualitas1 + $row->nilai_kuantitas1 +$row->nilai_kualitas2 + $row->nilai_kuantitas2 + $row->nilai_kualitas3 + $row->nilai_kuantitas3 + $row->nilai_kualitas4 + $row->nilai_kuantitas4 + ($row->nilai_bimbingan1 )  + $row->nilai_bimbingan2 )/10;
      
 if ($hasil>=4)
 echo("<b>A</b>");
 elseif ($hasil>=3.85)
 echo("<b>A</b>");
elseif ($hasil>=3.75)
 echo("<b>A-</b>");
elseif ($hasil>=3.65)
 echo("<b>A-</b>");
 elseif ($hasil>=3.5)
 echo("<b>B+</b>");
elseif ($hasil>=3.33)
 echo("<b>B+</b>");
 elseif ($hasil>=3)
 echo("<b>B</b>");
elseif ($hasil>=2.85)
 echo("<b>B</b>");
elseif ($hasil>=2.75)
 echo("<b>B-</b>");
elseif ($hasil>=3.65)
 echo("<b>B-</b>");
elseif ($hasil>=2.5)
 echo("<b>C+</b>");
elseif ($hasil>=2.25)
 echo("<b>C+</b>");
elseif ($hasil>=2)
 echo("<b>C</b>");
elseif ($hasil>=1.5)
 echo("<b>C</b>");
elseif ($hasil>=1)
 echo("<b>D</b>");
 else
 echo("<b>E</b>");
?></td>
   <td>
 <?php

 

    $mutu = ($row->nilai_kualitas1 + $row->nilai_kuantitas1 +$row->nilai_kualitas2 + $row->nilai_kuantitas2 + $row->nilai_kualitas3 + $row->nilai_kuantitas3 + $row->nilai_kualitas4 + $row->nilai_kuantitas4 + ($row->nilai_bimbingan1 )  + $row->nilai_bimbingan2  )/10;
  
 echo($mutu);
?></td>

                            <td>  
 <?php if($row->nilai_bimbingan1 == null  || $row->nilai_bimbingan2 == null || $row->nilai_kuantitas1 == null || $row->nilai_kuantitas2 == null || $row->nilai_kuantitas3 == null || $row->nilai_kuantitas4 == null || $row->nilai_kualitas1 == null || $row->nilai_kualitas2 == null || $row->nilai_kualitas3 == null || $row->nilai_kualitas4 == null){ ?>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-minus-circle">Belum Lengkap</i>&nbsp; </button>
                        <?php } elseif($row->nilai_bimbingan1 != null  && $row->nilai_bimbingan2 != null && $row->nilai_kuantitas1 != null && $row->nilai_kuantitas2 != null && $row->nilai_kuantitas3 != null && $row->nilai_kuantitas4 != null && $row->nilai_kualitas1 != null && $row->nilai_kualitas2 != null && $row->nilai_kualitas3 != null && $row->nilai_kualitas4 != null && $mutu<=1.9){?>
                     <a href="<?php echo base_url('nilai/status_gagal');?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-check">Nilai Lengkap</i></a>
                         <?php } elseif($row->nilai_bimbingan1 != null  && $row->nilai_bimbingan2 != null && $row->nilai_kuantitas1 != null && $row->nilai_kuantitas2 != null && $row->nilai_kuantitas3 != null && $row->nilai_kuantitas4 != null && $row->nilai_kualitas1 != null && $row->nilai_kualitas2 != null && $row->nilai_kualitas3 != null && $row->nilai_kualitas4 != null && $mutu>=2){?>
                   <a href="<?php echo base_url('nilai/status_lulus'); ?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-check">Nilai Lengkap</i></a>
                  
                        <?php } ?>
                          </td>
                                        
                            <td><?php echo $row->status1; ?></td>
                              
                           
                            <td>

                               
                                <a href="<?php echo base_url('nilai/esemp_nilai'); ?>/<?php echo $row->id_nilai; ?>"class="btn btn-success"><i class="fa fa-edit"></i></a></a>
                               
                               
                            </td>  
                           

                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
 <?php endif; ?> 
