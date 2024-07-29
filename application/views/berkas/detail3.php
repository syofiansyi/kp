
<div class="col-md-12">
    <div class="card">
<?php

                echo $this->session->flashdata('msg');
                ?>
        <div class="card-header bg-primary">
          <b>Berkas Sidang</b>
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
                           <th><center>Syarat Seminar</center></th>
                         
                                                
                        </tr>
                    </thead>
                    <tbody>                    
                       
                       <?php $no = 0;   foreach($mahasiswa->result()as $row){ ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->npm; ?></td>
                            <td> <?php echo $row->nama_mhs; ?></td>
                              <td align="center"><a href="<?php echo base_url('berkas/lihat') ?>/<?php echo $row->id_syarat; ?> "  target="_blank" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="lihat">Lihat</a></td>
                            
                        </tr>
                          <?php
                                        }
                                        ?>
                      
                       
                    </tbody>
                </table>                
            </div>
        </div>

