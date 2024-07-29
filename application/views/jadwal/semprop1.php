<?php
if(isset($_POST['cetak1'])){
$tahun = $_POST['tahun'];
redirect('semprop/cetak1/'.$tahun);


}
?>
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
           <b>Jadwal Seminar Proposal</b>
        </div>

       <div class="card-body">  
<form method="POST">
     <div class="dropdown show">
  <a class="btn btn-succes dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
  Status
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
     <a class="dropdown-item"  href="<?php echo base_url('semprop/Jdsemprop_selesai'); ?>">Selesai</a>
    <a class="dropdown-item" href="<?php echo base_url('semprop'); ?>">Proses</a>
  </div> 
  <input type="text" name="tahun" id="tgl" class="form-group col-md-2"  placeholder="Tahun / Tanggal" list="searchresults" autocomplete="off" />
                       <template id="resultstemplate">
                        <?php foreach ($semprop as $row):  ?>
                            <option value="<?php echo $row->tanggal; ?>"><?php echo $row->tanggal; ?></option>                            
                            <?php endforeach; ?></template>
                       <datalist id="searchresults"></datalist>
                     
                                                <button class="btn btn-xs btn-flat btn-info btnbrg-edit" type="submit" name="cetak1" value="Detail">
                                                     Cetak Jadwal
                                                    </button>

                                                </form>
                                              
                                         </div>  
    <br></br>
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
                             <th>Penguji Utama</th>
                            <th>Penguji Pendamping</th>
                              <th>Berita Acara</th>
                                                
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($Jdsemprop as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                             <td><?php echo $row->npm; ?></td>
                             <td><div><?php $day = date('d-m-Y', strtotime($row->tanggal)); echo $day;?></td>
                                  <td><div><?php echo $row->pukul;?></td>
                                      <td><div><?php echo $row->ruang;?></td>
                                         <td><div><?php echo $row->nama_pg1;?></td>
                                           <td><div><?php echo $row->nama_pg2;?></td>

                            
                             <td> 
                                 <?php $tgl = date('Y-m-d'); ?> 
<?php $tgl = date('Y-m-d'); if($row->tanggal>= $tgl){ ?>
                          <a href="<?php echo base_url('semprop/br_semprop'); ?>/<?php echo  $row->id_semprop; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="selesai"><i class="fa fa-download"></i></a>
                        <?php } elseif( $row->tanggal < $tgl){?>
                    <a href="<?php echo base_url('semprop/br_semprop'); ?>/<?php echo  $row->id_semprop; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="selesai"><i class="fa fa-download"></i></a>
                         
                  
                        <?php } ?>
                          </td>
                           
                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
    <script type="text/javascript">var search = document.querySelector('#tgl');
var results = document.querySelector('#searchresults');
var templateContent = document.querySelector('#resultstemplate').content;
search.addEventListener('keyup', function handler(event) {
    while (results.children.length) results.removeChild(results.firstChild);
    var inputVal = new RegExp(search.value.trim(), 'i');
    var set = Array.prototype.reduce.call(templateContent.cloneNode(true).children, function searchFilter(frag, item, i) {
        if (inputVal.test(item.textContent) && frag.children.length < 5) frag.appendChild(item);
        return frag;
    }, document.createDocumentFragment());
    results.appendChild(set);
});</script>
     <?php endif; ?>

 <?php if(($this->session->userdata('level') === '2') || ($this->session->userdata('akses') === 'dosen')):  ?>

<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Jadwal Seminar Proposal</b>
        </div>

        <div class="card-body">  
  <a class="btn btn-primary"
    href="<?php echo base_url('semprop/cetak4'); ?>">
    <i class="fas fa-download"aria-hidden="true"></i></a>
    <br></br>
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
                               <th>Penguji Utama</th>
                            <th>Penguji Pendamping</th>                   
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($Jdsemprop as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                             <td><?php echo $row->npm; ?></td>
                             <td><div><?php $day = date('d-m-Y', strtotime($row->tanggal)); echo $day;?></td>
                                  <td><div><?php echo $row->pukul;?></td>
                                      <td><div><?php echo $row->ruang;?></td>
                            <td><div><?php echo $row->nama_pg1;?></td>
                                           <td><div><?php echo $row->nama_pg2;?></td>
                            
                        </tr>
                        <?php endforeach; ?>
                      
                       
        </div>
    </div>
 <?php endif; ?>

