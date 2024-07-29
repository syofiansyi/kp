
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
                          
                                             
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($result as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                           
                             <td><?php echo $row->npm; ?></td>
                             
                               
                             
 <?php

 $this->db->select_sum('total');
        $this->db->where('id_bimbing',$row->id_bimbing);
        $this->db->where('jenis_seminar','semprop');
$query = $this->db->get('nilai'); 
   foreach ($query->result_array() as $i) :
  $mutu=$i['total'];
   $nilai = ($mutu)/32;
    $hasil = number_format($nilai,1);
?>                                   
<td>
 <?php
      
 if ($hasil>=85)
 echo("<b>A</b>");
 elseif ($hasil>=80)
 echo("<b>A-</b>");
elseif ($hasil>=75)
 echo("<b>B+</b>");
elseif ($hasil>=70)
 echo("<b>B</b>");
elseif ($hasil>=65)
 echo("<b>B-</b>");
elseif ($hasil>=60)
 echo("<b>C+</b>");
elseif ($hasil>=55)
 echo("<b>C</b>");
elseif ($hasil>=45)
 echo("<b>D</b>");
 else
 echo("<b>E</b>");
?></td>

   <td>
 <?php
 $jumlah =($hasil);
 echo "$jumlah";

?>
 <?php endforeach;?>

 </td>
 

   <td>  
    <?php 
  $this->db->where('total',null);
                $this->db->where('id_bimbing',$row->id_bimbing);
                 $this->db->where('jenis_seminar','semprop');
$this->db->from('nilai');
$uji = $this->db->count_all_results(); 

?>
 <?php if($uji >= 1 ){ ?>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-minus-circle">Belum Lengkap</i>&nbsp; </button>
                      <?php } elseif($uji == 0 && $jumlah < 55 ){?>
                     <a href="<?php echo base_url('nilai/status_gagal');?>/<?php echo $row->id_bimbing; ?>" class="btn btn-success"><i class="fa fa-check">Nilai Lengkap</i></a>
                         <?php } elseif($uji == 0  && $jumlah >=55 ){?>
                   <a href="<?php echo base_url('nilai/status_lulus'); ?>/<?php echo $row->id_bimbing; ?>" class="btn btn-success"><i class="fa fa-check">Nilai Lengkap</i></a>
                  
                        <?php } ?>
                          </td>
                        
                                        
                            <td><?php echo $row->status1; ?></td>
                              
                           
                           
                           

                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
 <?php endif; ?> 

<?php if($this->session->userdata('level') === '2'): ?>

<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Pengumuman Seminar Proposal</b>
        </div>
  <div class="card-body">            
            <div class="table-responsive">
     
             <!--  <a class="btn btn-primary"
    href="<?php echo base_url('nilai/tbsempnilai'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i></a> -->
</div>
</div>
   <div class="card-body">  
<div class="dropdown show">
  <a class="btn btn-succes dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
  Pilih
  </a>

 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="<?php echo base_url('nilai'); ?>">Semprop</i></a>
    <a class="dropdown-item" href="<?php echo base_url('nilai/nlsemhas'); ?>">Semhas</i></a>
    <a class="dropdown-item" href="<?php echo base_url('nilai/nlsidang'); ?>">Sidang</i></a>
  </div> 

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                           <th>Nama</th>
                            <th>Npm</th>
                            <th>Judul</th>
                            <th>Status Seminar</th>           
                                       
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($pengumuman as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            
                           <td><?php echo $row->nama_mhs; ?></td>
                           
                             <td><?php echo $row->npm; ?></td>
                               <td><?php echo $row->judul; ?></td>
                             
   <td>  
 <?php if($row->status1 == null  ){ ?>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-minus-circle">Proses</i>&nbsp; </button>
                        <?php } elseif($row->status1 == 'lulus' ){?>
                     <a href="<?php echo base_url('nilai/pengumuman_lulus');?>" class="btn btn-success"><i class="fa fa-check">Lihat</i></a>
                         <?php } elseif($row->status1 == 'gagal'){?>
                   <a href="<?php echo base_url('nilai/pengumuman_gagal'); ?>" class="btn btn-success"><i class="fa fa-check">Lihat</i></a>
                  
                        <?php } ?>
                          </td>        
                        
                           

                        </tr>
                       
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
 <?php endif; ?> 
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
                            <td><?php echo ++$no; ?></td>
                           
                             <td><?php echo $row->npm; ?></td>
                             
                               
                                
                              <?php

 $this->db->select_sum('total');
        $this->db->where('id_bimbing',$row->id_bimbing);
        $this->db->where('jenis_seminar','semprop');
$query = $this->db->get('nilai'); 
   foreach ($query->result_array() as $i) :
  $mutu=$i['total'];
   $nilai = ($mutu)/32;
    $hasil = number_format($nilai,1);
?>                                   
<td>
 <?php

 if ($hasil>=85)
 echo("<b>A</b>");
 elseif ($hasil>=80)
 echo("<b>A-</b>");
elseif ($hasil>=75)
 echo("<b>B+</b>");
elseif ($hasil>=70)
 echo("<b>B</b>");
elseif ($hasil>=65)
 echo("<b>B-</b>");
elseif ($hasil>=60)
 echo("<b>C+</b>");
elseif ($hasil>=55)
 echo("<b>C</b>");
elseif ($hasil>=45)
 echo("<b>D</b>");
 else
 echo("<b>E</b>");
?></td>

   <td>
 <?php
 $jumlah =($hasil);
 echo "$jumlah";

?>
 <?php endforeach;?>

 </td>
 

   <td>  
    <?php 
  $this->db->where('total',null);
                $this->db->where('id_bimbing',$row->id_bimbing);
                 $this->db->where('jenis_seminar','semprop');
$this->db->from('nilai');
$uji = $this->db->count_all_results(); 

?>
 <?php if($uji >= 1 ){ ?>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-minus-circle">Belum Lengkap</i>&nbsp; </button>
                      <?php } elseif($uji == 0 && $jumlah < 55){?>
                     <a href="<?php echo base_url('nilai/status_gagal');?>/<?php echo $row->id_bimbing; ?>" class="btn btn-success"><i class="fa fa-check">Nilai Lengkap</i></a>
                         <?php } elseif($uji == 0  && $jumlah >= 55){?>
                   <a href="<?php echo base_url('nilai/status_lulus'); ?>/<?php echo $row->id_bimbing; ?>" class="btn btn-success"><i class="fa fa-check">Nilai Lengkap</i></a>
                  
                        <?php } ?>
                          </td>
                                        
                            
                              <td>  <?php   $data = $this->session->userdata('username'); ?>
 <?php $tgl = date('Y-m-d'); if(($tgl < $row->tanggal ) && ($row->status == 'proses' )){ ?>
                          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-clock">Menunggu</i>&nbsp; </button>
                        <?php } elseif($uji == 0){?>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-check">Selesai</i>&nbsp; </button>
                  <?php } elseif($row->dipt== $data){?>
                     <a href="<?php echo base_url('nilai/esemp_nilai');?>/<?php echo $row->id_nilai; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                  
                        <?php } ?>
                          </td>
                           
                           
                             <td><?php echo $row->status1; ?></td>

                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
 <?php endif; ?> 