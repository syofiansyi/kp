<?php
if(isset($_POST['detail'])){
$tahun = $_POST['tahun'];
redirect('skripsi/detail/'.$tahun);


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
           <b>Pengajuan Judul Skripsi </b>
        </div>
  <div class="card-body">            
            <div class="table-responsive">
              <a class="btn btn-primary"
    href="<?php echo base_url('skripsi/tbskrip'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
</a> <a class="btn btn-success"
    href="<?php echo base_url('skripsi/acc_judul'); ?>"> <b>Pengajuan Dosen Pembimbing</b>
  <!--    href="<?php echo base_url('skripsi/acc_judul/?q='.$encryptext); ?>"> <b>Pengajuan Dosen Pembimbing</b> -->
</a>
</div>
</div>
   <div  class="card-body">
<form method="POST">
   <input placeholder="Pilih Tahun" class="btn  " type="text" list="data_mahasiswa" class="form-control" name="tahun" id="npm" autocomplete="off" required>
                   <datalist  id="data_mahasiswa">  <?php foreach ($satu as $row):  ?>
                                <option  value="<?php echo substr($row->tahun, 0);?> " ></option>                            
                            <?php endforeach; ?></datalist>
                                                </td>
                                                <td><button class="btn btn-xs btn-flat btn-info btnbrg-edit" type="submit" name="detail" value="Detail">
                                                       Lihat Data Skripsi
                                                    </button>
                                                    <!--<input type="submit" name="detail" value="Detail"></td>-->
                                                </tr>
                                                </form>
                                                <p></p>
                                         
                                         </td>
                                         </div>  
        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul Skripsi</th>
                            <th>Jenis Skripsi</th>
                            <th>Lokasi Penelitian</th>
                             <th>Tolak</th>
                            <th>Terima</th>  
                           <!--   <th>Terima Bersyarat</th>         -->                 
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($operator as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                            <td><?php echo $row->judul; ?></td>
                            <td><?php echo $row->jenis; ?></td>
                            <td><?php echo $row->lokasi; ?></td>
                           <td><a href="<?php echo base_url('skripsi/tolak_mahasiswa'); ?>/<?php echo $row->id_skripsi; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" onclick="return confirm('Yakin mau menolak ini ?')" ><i class="fa fa-window-close"></i></a></td>
                            <td>
                               <a href="<?php echo base_url('skripsi/edit_acc'); ?>/<?php echo $row->id_skripsi; ?>" class="btn btn-success"><i class="fa fa-check"></i></a>
                               
                            </td>
                            <!-- <td> <a href="<?php echo base_url('skripsi/terima_bersyarat'); ?>/<?php echo $row->id_skripsi; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a></td> -->
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>
 <?php endif; ?> 

 <?php if($this->session->userdata('dosen') === '2'): ?>
<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
           <b>Pengajuan Judul Skripsi </b>
        </div>
  <div class="card-body">            
            
</div>
   <div  class="card-body">
<form method="POST">
   <input placeholder="Pilih Tahun" class="btn  " type="text" list="data_mahasiswa" class="form-control" name="tahun" id="npm" autocomplete="off" required>
                   <datalist  id="data_mahasiswa">  <?php foreach ($satu as $row):  ?>
                                <option  value="<?php echo substr($row->tahun, 0);?> " ></option>                            
                            <?php endforeach; ?></datalist>
                                                </td>
                                                <td><button class="btn btn-xs btn-flat btn-info btnbrg-edit" type="submit" name="detail" value="Detail">
                                                       Lihat Data Skripsi
                                                    </button>
                                                    <!--<input type="submit" name="detail" value="Detail"></td>-->
                                                </tr>
                                                </form>
                                                <p></p>
                                         
                                         </td>
                                         </div>  
        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul Skripsi</th>
                            <th>Jenis Skripsi</th>
                            <th>Lokasi Penelitian</th>
                             <th>Tolak</th>
                            <th>Terima</th>  
                           <!--   <th>Terima Bersyarat</th>         -->                 
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($operator as $row): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td><?php echo $row->nama_mhs; ?></td>
                            <td><?php echo $row->judul; ?></td>
                            <td><?php echo $row->jenis; ?></td>
                            <td><?php echo $row->lokasi; ?></td>
                           <td><a href="<?php echo base_url('skripsi/tolak_mahasiswa'); ?>/<?php echo $row->id_skripsi; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" onclick="return confirm('Yakin mau menolak ini ?')" ><i class="fa fa-window-close"></i></a></td>
                            <td>
                               <a href="<?php echo base_url('skripsi/edit_acc'); ?>/<?php echo $row->id_skripsi; ?>" class="btn btn-success"><i class="fa fa-check"></i></a>
                               
                            </td>
                            <!-- <td> <a href="<?php echo base_url('skripsi/terima_bersyarat'); ?>/<?php echo $row->id_skripsi; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a></td> -->
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>
 <?php endif; ?> 
  <?php if($this->session->userdata('akses') === 'mahasiswa'): ?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary">
            <b>Data Skripsi</b>
        </div>
<div class="card-body">    

            <div class="table-responsive">
                        
        
                    <a class="btn btn-primary"
    href="<?php echo base_url('skripsi/tbskrip'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> 
</a>
</div>
  <div  class="card-body">
<form method="POST">
   <input placeholder="Pilih Tahun" class="btn  " type="text" list="data_mahasiswa" class="form-control" name="tahun" id="npm" autocomplete="off" required>
                   <datalist  id="data_mahasiswa">  <?php foreach ($satu as $row):  ?>
                                <option  value="<?php echo substr($row->tahun, 0);?> " ></option>                            
                            <?php endforeach; ?></datalist>
                                                </td>
                                                <td><button class="btn btn-xs btn-flat btn-info btnbrg-edit" type="submit" name="detail" value="Detail">
                                                       Lihat Data Skripsi
                                                    </button>
                                                    <!--<input type="submit" name="detail" value="Detail"></td>-->
                                                </tr>
                                                </form>
                                                <p></p>
                                         
                                         </td>
                                         </div>  
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>      
                            <th>Npm</th>                   
                            <th>Judul Skripsi</th>                    
                            <th>Jenis</th>
                            <th>Lokasi Penelitian</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>                    
                        <?php foreach($mahasiswa as $row): ?>
                        <tr>
                           <td><?php echo $row->nama_mhs; ?></td>
                            <td><?php echo $row->npm; ?></td>
                               <td ><?php echo $row->judul; ?></td>
                                <td><?php echo $row->jenis; ?></td>
                                  <td><?php echo $row->lokasi; ?></td>
                                    <td>  
 <?php if($row->acc_judul=='proses'){ ?>
                            <button class="btn btn-warning"><i class="fa fa-check">Proses</i></a></button>
                        <?php } elseif($row->acc_judul=='selesai'){?>
                     <button  class="btn btn-success"> <a 
    href="<?php echo base_url('Stsdosen'); ?>">
   <i class="fa fa-check">Diterima</i></a></button>
                         <?php } elseif($row->acc_judul=='tolak'){?>
                     <button class="btn btn-danger"><i class=" fa fa-window-close"> Ditolak</i></a></button>
                          <?php } elseif($row->acc_judul=='terima'){?>
                     <button  class="btn btn-success"> <a
    href="<?php echo base_url('Stsdosen'); ?>">
   <i class="fa fa-check">Diterima</i></a></button>
    <?php } elseif($row->acc_judul=='tb'){?>
                     <button  class="btn btn-success"> <a
    href="<?php echo base_url('Stsdosen'); ?>">
   <i class="fa fa-check">Diterima Bersyarat</i></a></button>

                  
                        <?php } ?>
                          </td>
                           <td>  
 <?php if($row->acc_judul=='proses'){ ?>
                          <a href="<?php echo base_url('skripsi/etbskrip'); ?>/<?php echo $row->id_skripsi; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></a>
                        <?php } elseif($row->acc_judul=='selesai'){?>
                       <button  class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></button>
                         <?php } elseif($row->acc_judul=='terima'){?>
                       <button  class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></button>
                          <?php } elseif($row->acc_judul=='tolak'){?>
                     <button  class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></button>
                         
                  
                        <?php } ?>
                          </td>
                                                                             
                           
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 <?php endif; ?> 
