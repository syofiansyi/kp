<?php
if(isset($_POST['detail2'])){
$tahun = $_POST['tahun'];
redirect('berkas/detail2/'.$tahun);


}
?>
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

<?php if($this->session->userdata('akses') === 'operator'): ?>
<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
          <b>Berkas Sidang Skripsi</b>
        </div>
<div  class="card-body">
<form method="POST">
   <input placeholder="Pilih Tahun" class="btn  " type="text" list="data_mahasiswa" class="form-control" name="tahun" id="npm" autocomplete="off" required>
                   <datalist  id="data_mahasiswa">  <?php foreach ($satu as $row):  ?>
                                <option  value="<?php echo $row->tahun;?> " ></option>                            
                            <?php endforeach; ?></datalist>
                                                </td>
                                                <td><button class="btn btn-xs btn-flat btn-info btnbrg-edit" type="submit" name="detail2" value="Detail">
                                                       Lihat Berkas
                                                    </button>
                                                    <!--<input type="submit" name="detail" value="Detail"></td>-->
                                                </tr>
                                                </form>
                                                <p></p>
                                         
                                         </td>
                                         </div>  
                                         <div class="card-body">
<div class="card-body">            
            <div class="table-responsive">
              <a class="btn btn-primary"
    href="<?php echo base_url('berkas/tbsidang'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> 
</a>
</div>
        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Npm</th>
                            <th>Nama Mahasiswa</th>
                           <th>LHS</th>
                           <th>Bukti Bimbingan</th>
                            <th>KRS</th>
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($opr as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                            <td><a href="<?php echo base_url('berkas/lihat1'); ?>/<?php echo $row->id_syarat; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="hapus">Lihat</i></a></td>
                           
                            
                             <td><a href="<?php echo base_url('berkas/lihat'); ?>/<?php echo $row->id_syarat; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="hapus">Lihat2</i></a></td>
                   <td><a href="<?php echo base_url('berkas/lihat'); ?>/<?php echo $row->id_syarat; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="hapus">Lihat</i></a></td>
                            <td>

                                <a href="<?php echo base_url('berkas/delete_mahasiswa'); ?>/<?php echo $row->id_syarat; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-eraser"></i></a>
                               
                               <a href="<?php echo base_url('berkas/iptsidang'); ?>/<?php echo $row->id_syarat; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                               
                            </td>
                        </tr>
                        <?php endforeach; ?>
                      
                       
                    </tbody>
                </table>                
            </div>
        </div>

<?php endif; ?> 

<?php if($this->session->userdata('akses') === 'mahasiswa'): ?>
<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
          <b>Berkas Sidang Skripsi</b>
        </div>

   <div class="card-body">            
           
        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Npm</th>
                            <th>Nama Mahasiswa</th>
                            <th>Syarat Seminar</th>
                            <th>Status</th>
                                                  
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($mhs as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                         <td> <?php echo $row->nama_mhs; ?></td>
                            <td><a href="<?php echo base_url('/gambar/'.$row->kb_semprop) ?> "  target="_blank" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="lihat">Lihat</a></td>

                               <td>  
 <?php if($row->acc_seminar=='s3'){ ?>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#scrollmodal4"><i class="fa fa-minus-circle">Selesai</i>&nbsp; </button>
                        <?php } elseif($row->acc_seminar=='semprop'){?>
                     <button class="btn btn-warning"><i class="fa fa-check">Proses</i></a></button>
                         
                  
                        <?php } ?>
                          </td>
                           
                        </tr>
                        <?php endforeach; ?>
                      
                       
                    </tbody>
                </table>                
            </div>
        </div>
<?php endif; ?> 
