
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


?>

<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
          <b>Pesan Masuk</b>
        </div>
 


             <div class="card-body">            
            <div class="table-responsive">
              <a class="btn btn-primary"
    href="<?php echo base_url('akun/tbpesan'); ?>">
    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> 
</a>
 <a class="btn btn-primary"
    href="<?php echo base_url('akun/pesanbc'); ?>">
    <i class="fa fa-reply" aria-hidden="true"></i> 
</a>
<a class="btn btn-primary"
    href="<?php echo base_url('akun/pesan'); ?>">
    <i class="fa fa-share" aria-hidden="true"></i> 
</a>
</div>       
</div>        
    <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th> Pesan</th>
                         
                            <th> </th>

                            
                             <th> Hapus</th>
                          
                                         
                        </tr>
                    </thead>
                    <tbody>                    
                       
                        <?php $no = 0; foreach($pesan as $row): ?>
                      
                         <tr>
                           <td><?php echo "<font color='#8B0000'> $row->pengirim </font>"; ?></td>
                               <td><?php if($row->status == 'terkirim'){ ?>
                       <a href="<?php echo base_url('akun/gtpesanbc'); ?>/<?php echo $row->id_pesan; ?>"  style=" text-align: justify; color: red;  "><?php echo substr($row->pesan,0,10);?><?php echo "  <b>Lihat detail..........</b>";  ?></a>
                        <?php } elseif($row->status='dibaca'){?>
                 <a href="<?php echo base_url('akun/gtpesanbc'); ?>/<?php echo $row->id_pesan; ?>"  style=" text-align: justify; color: black;  "><?php echo substr($row->pesan,0,10);?><?php echo "  <b>Lihat detail..........</b>";  ?></a>
                  
                        <?php } ?></td>
                                
                               <td>  <a href="<?php echo base_url('akun/delete_pesan'); ?>/<?php echo $row->id_pesan; ?>" class="btn btn-danger"><i class="fa fa-eraser"></i></a>
                               </td>
                        </tr>
                        <?php endforeach; ?>
                      
                       
                    </tbody>
                </table>                
            </div>
        </div>
 