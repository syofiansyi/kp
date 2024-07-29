
<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-12 col-sm-offset-12">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Ubah Berkas Seminar Proposal</b>
        </div>
        <div class="card-body">   
  
     <form action="<?=base_url('berkas/etbsemprop') ?>" method="post" enctype="multipart/form-data">

                    <div class="row" id="row">
                        <div class="col-md-6"> 
               <div class="form-group">
                        <label for="NPM" class="form-control-label"> NPM :</label>
                        <input type="text" id="npm" name="npm" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly/>
                    </div>
                  </div>
                   
                    <div class="form-group">
                         <?php 
                         $npm = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('syarat');
        $this->db->where('npm',$npm);
        $this->db->where('acc_seminar','semprop');
        $query = $this->db->get();
               
                  foreach ($query->result_array() as $i) :
                      $id_syarat=$i['id_syarat'];
                    
              ?>
                        <input  type="hidden" name="id_syarat" class="form-control" value="<?php echo $id_syarat  ?>" readonly/>
                    </div>
    <?php $check=$this->db->get_where('syarat',array('id_syarat'=>$id_syarat))->result_array(); ?>
     <div class="col-md-6">
         <div class="form-group">
          <label>File Skripsi:</label>
          <?php if(!empty($check[0]['fileskrip'])){ ?>
             <input type="file"  class="form-control" name="fileskrip" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                          
                        <?php }else{?>
                             <input type="file"  class="form-control" name="fileskrip" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                       
                        <?php } ?>
         
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Kartu Bimbingan:</label>
           <?php if(!empty($check[0]['kbskrip'])){ ?>
             <input type="file"  class="form-control"  name="kbskrip" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                          
                        <?php }else{?>
                           <input type="file"  class="form-control"  name="kbskrip" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                         
                        <?php } ?>
         
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Surat Izin Seminar:</label>
           <?php if(!empty($check[0]['sizin'])){ ?>
              <input type="file"  class="form-control"  name="sizin" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                        
                        <?php }else{?>
                          <input type="file"  class="form-control"  name="sizin" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                          
                        <?php } ?>
         
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Bukti UKT:</label>
           <?php if(!empty($check[0]['ukt'])){ ?>
             <input type="file"  class="form-control"  name="ukt" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                       
                        <?php }else{?>
                          <input type="file"  class="form-control"  name="ukt" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                         
                        <?php } ?>
          
        </div>
      </div>
     
       <div class="col-md-6">
         <div class="form-group">
          <label>Transkrip:</label>
           <?php if(!empty($check[0]['transkrip'])){ ?>
             <input type="file"  class="form-control"  name="transkrip" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                       
                        <?php }else{?>
                           <input type="file"  class="form-control"  name="transkrip" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                        
                        <?php } ?>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>LHS:</label>
          <?php if(!empty($check[0]['lhs'])){ ?>
             <input type="file"  class="form-control"  name="lhs" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                       
                        <?php }else{?>
                           <input type="file"  class="form-control"  name="lhs" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                        
                        <?php } ?>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>KRS:</label>
         <?php if(!empty($check[0]['krs'])){ ?>
           <input type="file"  class="form-control"  name="krs" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                       
                        <?php }else{?>
                             <input type="file"  class="form-control"  name="krs" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                      
                        <?php } ?>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Ijazah:</label>
         <?php if(!empty($check[0]['ijazah'])){ ?>
             <input type="file"  class="form-control"  name="ijazah" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                     
                        <?php }else{?>
                          <input type="file"  class="form-control"  name="ijazah" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                         
                        <?php } ?>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>NIM SMA:</label>
          <?php if(!empty($check[0]['nim'])){ ?>
              <input type="file"  class="form-control"  name="nim" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                      
                        <?php }else{?>
                           <input type="file"  class="form-control"  name="nim" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                        
                        <?php } ?>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Foto:</label>
          <?php if(!empty($check[0]['foto'])){ ?>
              <input type="file"  class="form-control"  name="foto" >
                          <button type="submit" name="btnlogin" class="form-control btn btn-success"><i class="fa fa-check">Sudah di upload</i>&nbsp; </button>
                      
                        <?php }else{?>
                          <input type="file"  class="form-control"  name="foto" >
                            <button type="submit" name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
                         
                        <?php } ?>
        </div>
         <div class="form-group">
         <input type="hidden" name="tahun" class="form-control" value="<?php echo date("Y") ?>"    >
        </div>
       <?php endforeach;?>
                  
      </form>
    </div>
  </div>
</div>
  
  <script type="text/javascript">    
    $(document).ready(function(){        
        $('#id_skripsi').on('change',function(){            
        var id_skripsi=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('berkas/getk2')?>",
                dataType : "JSON",
                data : {id_skripsi: id_skripsi},
                cache:false,
                success: function(data){
                    $.each(data,function(id_skripsi,npm){
                      
                        
                           $('[name="npm"]').val(data.npm);
                         $('[name="id_syarat"]').val(data.id_skripsi);
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>


