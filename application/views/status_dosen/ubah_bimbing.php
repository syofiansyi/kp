<?php echo validation_errors(); ?>
<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Ubah Pembimbing</b>
        </div>
        <div class="card-body">   
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('Stsdosen/edit_pembimbing'); ?>/<?php echo $id_bimbing; ?>">

          <div class="form-group">
                 <label>Pembimbing Utama:</label>
                   <input type="text" list="data_mahasiswa" class="form-control" name="pb1" id="pb1" autocomplete="off" required value="<?php echo $pb1; ?>">
                   <datalist  id="data_mahasiswa">  <?php foreach ($get as $row):  ?>
                            <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_dosen; ?></option>                          
                            <?php endforeach; ?></datalist>
              
              </div>
      <div class="form-group">
                 <label>Pembimbing Pendamping:</label>
                   <input type="text" list="data_mahasiswa" class="form-control" name="pb2" id="pb2" autocomplete="off" required value="<?php echo $pb2; ?>">
                   <datalist  id="data_mahasiswa">  <?php foreach ($get as $row):  ?>
                            <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_dosen; ?></option>                  
                            <?php endforeach; ?></datalist>
              
              </div>
                 
         
                    
                    <div class="form-group">
                        
                        <input type="hidden" name="id_bimbing" class="form-control" value="<?php echo $id_bimbing; ?>" readonly="" required="" />
                    </div>
                     <div class="form-group">
                        
                        <input type="text" name="nama_pb1" class="form-control" value="<?php echo $nama_pb1; ?>" readonly="" required="" />
                    </div>
                     <div class="form-group">
                        
                        <input type="text" name="nama_pb2" class="form-control"  value="<?php echo $nama_pb2; ?>" readonly required="" />
                    </div>

        <div class="form-group">
                    <button id="btnSubmit" value="simpan" name="btnlogin" type="submit"class="btn btn-success btn-block">Simpan <i class="icon-circle-right2 position-right"></i></button>
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
        var pb1=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Stsdosen/get_nmdosen')?>",
                dataType : "JSON",
                data : {nip: pb1},
                cache:false,
                success: function(data){
                    $.each(data,function(nip,nama_dosen){
                      
                        
                           $('[name="pb1"]').val(data.nip);
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
        var pb2=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Stsdosen/get_nmdosen')?>",
                dataType : "JSON",
                data : {nip: pb2},
                cache:false,
                success: function(data){
                    $.each(data,function(nip,nama_dosen){
                      
                        
                           $('[name="pb2"]').val(data.nip);
                         $('[name="nama_pb2"]').val(data.nama_dosen);
                          
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>

<script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var pb1 = $("#pb1").val();
                var pb2 = $("#pb2").val();
                if (pb1 == pb2) {
                    alert("Data yang dinput sama");
                    return false;
                }
                return true;

            });
        });
    </script>
  
  