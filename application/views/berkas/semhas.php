<?php
if(isset($_POST['detail1'])){
$tahun = $_POST['tahun'];
redirect('berkas/detail1/'.$tahun);


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
          <b>Berkas Semhas</b>
        </div>
 


 <div  class="card-body">
<form method="POST">
   <input placeholder="Pilih Tahun" class="btn  " type="text" list="data_mahasiswa" class="form-control" name="tahun" id="npm" autocomplete="off" required>
                   <datalist  id="data_mahasiswa">  <?php foreach ($satu as $row):  ?>
                                <option  value="<?php echo $row->tahun;?> " ></option>                            
                            <?php endforeach; ?></datalist>
                                                </td>
                                                <td><button class="btn btn-xs btn-flat btn-info btnbrg-edit" type="submit" name="detail1" >
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
    href="<?php echo base_url('berkas/tbsemhas'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> 
</a>
</div>       
</div>        
<div class="card-body">
        <p><b>Persyaratan :</b></p>
<p>Bukti pembayaran uang buku penelitian, lembar konsultasi, bukti lunas UKT, transkrip nilai, lhs, krs, ijazah, nim sma, pas photo 3x4 (1lembar),surat bebas plagiat materai 600, surat izin skripsi</p>
<p><b>Semua persyaratan yang ada disatukan berbentuk PDF</b></p>
        </div> 
        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Npm</th>
                            <th>Nama Mahasiswa</th>
                           <th>Syarat Seminar</th>
                            <th>Aksi</th>                         
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($opr as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                          
                           
                <td>
                    <?php if($row->fileskrip == null){ ?>
                    <a   target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">File Skrip</i></a>
 <?php } elseif($row->kbskrip == null){?>
                     <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Kartu Bimbingan</i></a>
                         <?php } elseif($row->sizin == null ){?>
                 <a   target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Surat Izin</i></a>
                  <?php } elseif($row->ukt == null ){?>
                 <a target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">UKT</i></a>
                  <?php } elseif($row->sizin == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Surat Izin</i></a>
                  <?php } elseif($row->transkrip == null ){?>
                 <a   target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Transkrip</i></a>
                  <?php } elseif($row->lhs == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">LHS</i></a>
                  <?php } elseif($row->krs == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">KRS</i></a>
                  <?php } elseif($row->ijazah == null ){?>
                 <a   target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Ijazah</i></a>
                  <?php } elseif($row->nim == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">NIM</i></a>
                  <?php } elseif($row->foto == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Foto</i></a>
                   <?php } else{?>
                     <a href="<?php echo base_url('berkas/lihat') ?>/<?php echo $row->id_syarat; ?> "  target="_blank" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="lihat">Lengkap</a>
                        <?php } ?>






                  </td>
                            <td>
                         

                                <a href="<?php echo base_url('berkas/delete_mahasiswa'); ?>/<?php echo $row->id_syarat; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" onclick="return confirm('Yakin mau menghapus ini ?')" title="hapus"><i class="fa fa-eraser"></i></a>
                               
                               <a href="<?php echo base_url('berkas/iptsemhas'); ?>/<?php echo $row->id_syarat; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                               
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
          <b>Berkas Seminar Hasil</b>
        </div>
 
  
                                        <div class="card-body">
<div class="card-body">            
            <div class="table-responsive">
              <a class="btn btn-primary"
    href="<?php echo base_url('berkas/tbsemhas'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> 
</a>
</div>       
</div>      
       
 <div class="card-body">
        <p><b>Persyaratan :</b></p>
<p>Bukti pembayaran uang buku penelitian, lembar konsultasi, bukti lunas UKT, transkrip nilai, lhs, krs, ijazah, nim sma, pas photo 3x4 (1lembar),surat bebas plagiat materai 600, surat izin skripsi</p>
<p><b>Semua persyaratan yang ada sdisatukan berbentuk PDF</b></p>
        </div>   
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
                            <th>Aksi</th>
                                           

                        </tr>
                    </thead>
                    <tbody>                    
                       
                      
                        <?php $no = 0; foreach($ms as $row): ?>
                          <?php if(($row->acc_seminar == 'semhas') || ($row->acc_seminar == 's2')): ?>
                        <tr>
                        
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            
                            <td> <?php echo $row->nama_mhs; ?></td>
                   <td>
                    <?php if($row->fileskrip == null){ ?>
                    <a   target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">File Skrip</i></a>
 <?php } elseif($row->kbskrip == null){?>
                     <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Kartu Bimbingan</i></a>
                         <?php } elseif($row->sizin == null ){?>
                 <a   target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Surat Izin</i></a>
                  <?php } elseif($row->ukt == null ){?>
                 <a target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">UKT</i></a>
                  <?php } elseif($row->sizin == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Surat Izin</i></a>
                  <?php } elseif($row->transkrip == null ){?>
                 <a   target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Transkrip</i></a>
                  <?php } elseif($row->lhs == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">LHS</i></a>
                  <?php } elseif($row->krs == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">KRS</i></a>
                  <?php } elseif($row->ijazah == null ){?>
                 <a   target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Ijazah</i></a>
                  <?php } elseif($row->nim == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">NIM</i></a>
                  <?php } elseif($row->foto == null ){?>
                 <a  target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="lihat"><i class="fa fa-window-close">Foto</i></a>
                   <?php } else{?>
                     <a href="<?php echo base_url('berkas/lihat') ?>/<?php echo $row->id_syarat; ?> "  target="_blank" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="lihat">Lengkap</a>
                        <?php } ?>






                  </td>
                  <td>  
 <?php if($row->acc_seminar=='semhas'){ ?>
     <button class="btn btn-warning"><i class="fa fa-check">Proses</i></a></button>
                         &nbsp; </button>
                        <?php } elseif($row->acc_seminar=='s2'){?>
                     <button class="btn btn-success"><i class="fa fa-check">Selesai</i></a></button>
                         
                  
                        <?php } ?>
                          </td>
                           <td>  
 <?php if($row->acc_seminar=='semhas'){ ?>
 <a href="<?php echo base_url('berkas/etbsemhas'); ?>/<?php echo $row->id_syarat; ?> " class="btn btn-success"><i class="fa fa-edit"></i></a>
                         &nbsp; </button>
                        <?php } elseif($row->acc_seminar=='s2'){?>
                 <button  class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></button>
                         
                  
                        <?php } ?>
                          </td>
                          <?php endif; ?> 

                         
                                                    </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>                
            </div>
        </div>
<?php endif; ?> 
