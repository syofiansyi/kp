 <div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Dosen Pembimbing</b>
        </div>
        <div class="card-body"> 
          <?php extract($mahasiswa2); ?>  
 <form action="<?php echo base_url('skripsi/tbp'); ?>/<?php echo $id_skripsi; ?>" method="post">
            
               
                <?php
                echo $this->session->flashdata('msg');
                ?>
                 <div class="form-group">
         
         <input type="hidden" id="1" name="id_bimbing" class="form-control" value="<?php echo $id_skripsi; ?>"   readonly >
        </div>
         <div class="form-group">
         
         <input type="hidden" name="id_skripsi" class="form-control" value="<?php echo $id_skripsi; ?>"   readonly >
        </div>
         

               <div class="form-group">
          <label>NPM:</label>
         <input type="text" id="1" name="npm" class="form-control" value="<?php echo $npm; ?>"   readonly >
        </div>
        
                <div class="form-group">
                    <label>Dosen Pembimbing 1:</label>
                   <input type="text" list="data_mahasiswa" class="form-control" name="pb1" id="pb1" autocomplete="off" required>
                   <datalist  id="data_mahasiswa">  <?php foreach ($dosen as $row):  ?>
                            <option value="<?php echo $row->nip; ?>"><?php echo $row->nip; ?><?php echo $row->nama_dosen; ?></option>                            
                            <?php endforeach; ?></datalist>
               
              
              </div>
                <div class="form-group">
                 <label>Dosen Pembimbing 2:</label>
                   <input type="text" list="data_mahasiswa" class="form-control" name="pb2" id="pb2" autocomplete="off" required>
                   <datalist  id="data_mahasiswa">  <?php foreach ($dosen as $row):  ?>
                            <option value="<?php echo $row->nip; ?>"><?php echo $row->nip; ?><?php echo $row->nama_dosen; ?></option>                            
                            <?php endforeach; ?></datalist>
              
              </div>
              
           <div class="form-group">
                       
                        <input  type="hidden"  name="nama_pb1" class="form-control" value="" readonly/>
                    </div> 
                     <div class="form-group">
                     
                        <input type="hidden"  name="nama_pb2" class="form-control" value="" readonly/>
                    </div> 
                 <div class="form-group">
                  <button type="submit" id="btnlogin"  name="btnlogin" class="btn btn-success btn-block">  <span class="glyphicon glyphicon-check"></span>Simpan</button>
                </div>
                  
      </form>
    </div>
  </div>
</div>
<style type="text/css">
 #bagas {
    
    width: 100%;
    margin-right: 30%;
    margin-left: 30%;
}
</style>
  
  <script type="text/javascript">    
    $(document).ready(function(){        
        $('#pb1').on('change',function(){            
        var nip=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('skripsi/getbi')?>",
                dataType : "JSON",
                data : {nip: nip},
                cache:false,
                success: function(data){
                    $.each(data,function(nip,nama_dosen){
                      
                        
                           $('[name="nip"]').val(data.nip);
                         $('[name="nama_pb1"]').val(data.nama_dosen);
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>
<script type="text/javascript">    
    $(document).ready(function(){        
        $('#pb2').on('change',function(){            
        var nip=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('skripsi/getbi')?>",
                dataType : "JSON",
                data : {nip: nip},
                cache:false,
                success: function(data){
                    $.each(data,function(nip,nama_dosen){
                      
                        
                           $('[name="nip"]').val(data.nip);
                         $('[name="nama_pb2"]').val(data.nama_dosen);
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>
 <script type="text/javascript">    
    $(document).ready(function(){        
        $('#pb1').on('change',function(){            
        var nip=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('skripsi/getbi')?>",
                dataType : "JSON",
                data : {nip: nip},
                cache:false,
                success: function(data){
                    $.each(data,function(nip,nama_dosen){
                      
                        
                           $('[name="nip"]').val(data.nip);
                         $('[name="nama_pb1"]').val(data.nama_dosen);
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>
<script type="text/javascript"> window.onLoad = function() {
    for (var i=0; i<1; i++) {
        var name = "Option "+i;
        var sel = document.getElementById("npm");
        sel.options[sel.options.length] = new Option(name,i);
    }
};</script>

 <script type="text/javascript">
        $(function () {
            $("#btnlogin").click(function () {
                var pb2 = $("#pb2").val();
                var pb1 = $("#pb1").val();
                if (pb1 == pb2) {
                    alert("Data yang dinput  sama");
                    return false;
                }
                return true;

            });
        });
    </script>