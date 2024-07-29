<div class="col-md-12">
    <div class="card">

        <div class="card-header bg-primary">
           <b>Laporan</b>
        </div>
  <div class="card-body">            
            <div class="table-responsive">
      <a class="btn btn-primary"
    href="<?php echo base_url('laporan/cetak1'); ?>">
    <i class="fas fa-download"aria-hidden="true"></i></a>
            
</div>
</div>

        <div class="card-body">  

            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                           
                            <th>Npm</th>
                           
                            
                             
                               <th>Lama Penelitian</th>
                                 
                             
                                       
                        </tr>
                    </thead>
                    <tbody>                    
                   
                       
                        <?php $no = 0; foreach($result as $row){
                          
                           
                                                   
                                            ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                           
                             <td><?php echo $row->npm; ?></td>
                               
                                
                                   <td>
 <?php

 

  $start_date = new DateTime("$row->tanggalse");
$end_date = new DateTime("$row->tanggal");
$interval = $start_date->diff($end_date);
echo "$interval->y Tahun "; // hasil : 217 hari
echo "$interval->m Bulan "; // hasil : 217 hari
echo "$interval->d Hari "; // hasil : 217 hari

?></td>
   <td>            
                        </tr>
                        <?php
                                            }
                                            ?>
                      
                       
        </div>
    </div>


