<?php echo validation_errors ("");  ?>
<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Ubah Penguji</b>
        </div>
        <div class="card-body">   
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('Stsdosen/edit_penguji_sidang'); ?>/<?php echo $id_sidang; ?>">

          <div class="form-group">
                 <label>Penguji Utama:</label>
                   <input type="text" list="data_mahasiswa" class="form-control" name="pg1" id="pg1" autocomplete="off" required value="<?php echo $pg1; ?>">
                   <datalist  id="data_mahasiswa">  <?php foreach ($get as $row):  ?>
                         <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_dosen; ?></option>                         
                            <?php endforeach; ?></datalist>
              
              </div>
      <div class="form-group">
                 <label>Penguji Pendamping:</label>
                   <input type="text" list="data_mahasiswa" class="form-control" name="pg2" id="pg2" autocomplete="off" required value="<?php echo $pg2; ?>">
                   <datalist  id="data_mahasiswa">  <?php foreach ($get as $row):  ?>
                            <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_dosen; ?></option>                        
                            <?php endforeach; ?></datalist>
              
              </div>
                 
         
                     <div class="form-group">
                        
                        <input name="id_sidang" type="hidden"class="form-control" value="<?php echo $id_sidang; ?>" readonly="" required="Pilih Nip Dosen" />
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="nama_pg1" class="form-control" value="<?php echo $nama_pg1; ?>" readonly="" required="" />
                    </div>
                     <div class="form-group">
                        
                        <input type="text" name="nama_pg2" class="form-control"  value="<?php echo $nama_pg2; ?>" readonly required="" />
                    </div>
                    <div class="form-group">
                        
                        <input type="hidden" id="pb1" class="form-control" value="<?php echo $pb1; ?>" readonly="" required="" />
                    </div>
                     <div class="form-group">
                        
                        <input type="hidden" id="pb2"  class="form-control"  value="<?php echo $pb2; ?>" readonly required="" />
                    </div>

        <div class="form-group">
                    <button id="btnSubmit" name="btnlogin" type="submit"class="btn btn-success btn-block">Simpan <i class="icon-circle-right2 position-right"></i></button>
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
        $(function () {
            $("#btnSubmit").click(function () {
                var pb1 = $("#pb1").val();
                var pb2 = $("#pb2").val();
                var pg1 = $("#pg1").val();
                var pg2 = $("#pg2").val();
                if (pg1 == pg2) {
                    alert("Dosen Penguji Tidak Boleh Sama");
                    return false;
                }
                 if (pb1 == pg1) {
                    alert("Dosen Penguji  Utama adalah Dosen Pembimbing Utama");
                    return false;
                }
                 if (pb1 == pg2) {
                    alert("Dosen Penguji Pendamping adalah Dosen Pembimbing Utama");
                    return false;
                }
                 if (pb2 == pg1) {
                    alert("Dosen Penguji Utama adalah Dosen Pembimbing Pendamping");
                    return false;
                }
                 if (pb2 == pg2) {
                    alert("Dosen Penguji Pendamping adalah Dosen Pembimbing Pendamping");
                    return false;
                }
                return true;

            });
        });
    </script>
<script type="text/javascript">    
    $(document).ready(function(){        
        $('#pg1').on('change',function(){            
        var pg1=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Stsdosen/get_nmdosen')?>",
                dataType : "JSON",
                data : {nip: pg1},
                cache:false,
                success: function(data){
                    $.each(data,function(nip,nama_dosen){
                      
                        
                           $('[name="pg1"]').val(data.nip);
                         $('[name="nama_pg1"]').val(data.nama_dosen);
                          
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>
<script type="text/javascript">    
    $(document).ready(function(){        
        $('#pg2').on('change',function(){            
        var pg2=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Stsdosen/get_nmdosen')?>",
                dataType : "JSON",
                data : {nip: pg2},
                cache:false,
                success: function(data){
                    $.each(data,function(nip,nama_dosen){
                      
                        
                           $('[name="pg2"]').val(data.nip);
                         $('[name="nama_pg2"]').val(data.nama_dosen);
                          
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>


  