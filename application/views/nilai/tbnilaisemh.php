
<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Tambah Nilai Semhas</b>
        </div>
        <div class="card-body">   
    
     <form action="<?=base_url('nilai/tbsemh') ?>" method="post">

         <div class="form-group">
                        
                        <select id="id_semhas" name="id_nilai" class="form-control">                            
                            <option value=""> -- Pilih Nama Mahasiswa -- </option>
                         
                           
                            <?php $no = 0; foreach ($semhas as $row): ?>
                                <option value="<?php echo $row->id_semhas; ?>"><?php echo $row->id_semhas; ?> <?php echo $row->npm; ?> </option>                            
                            <?php endforeach; ?>
                           
                           
                            
                        </select>
                    </div>  
                    
                        <div class="form-group">
                        <label for="npm" class="form-control-label">NPM :</label>
                        <input id="npm" name="npm" class="form-control" value="" readonly/>
                    </div> 
                    <div class="form-group">
                        <label for="pb1" class="form-control-label">NIP Pembimbing 1 :</label>
                        <input id="pb1" name="pb1" class="form-control" value="" readonly/>
                    </div>  
                    <div class="form-group">
                        <label for="pb2" class="form-control-label">NIP Pembimbing 2 :</label>
                        <input id="pb2" name="pb2" class="form-control" value="" readonly/>
                    </div> 
                    <div class="form-group">
                        <label for="pb2" class="form-control-label">NIP Pembimbing 2 :</label>
                        <input id="jenis_seminar" name="jenis_seminar" class="form-control" value="semhas" readonly/>
                    </div>  
                     <div class="form-group">
                        <label for="pg1" class="form-control-label">NIP Penguji 1 :</label>
                        <input id="pg1" name="pg1" class="form-control" value="" readonly/>
                    </div>  
                     <div class="form-group">
                        <label for="pg2" class="form-control-label">NIP Penguji 2 :</label>
                        <input id="pg2" name="pg2" class="form-control" value="" readonly/>
                    </div> 
                    

                    
         <div class="form-group">
          <label>Nilai Bimbingan:</label>
          <input type="text"  class="form-control"  name="nilai_bimbingan1" >
          <input type="text"  class="form-control"  name="nilai_bimbingan2" >
          
        </div>
        <div class="form-group">
          <label>Nilai Kuantitas:</label>
          <input type="text"  class="form-control"  name="nilai_kualitas1" >
          <input type="text"  class="form-control"  name="nilai_kualitas2" >
          <input type="text"  class="form-control"  name="nilai_kualitas3" >
          <input type="text"  class="form-control"  name="nilai_kualitas4" >
        </div>
         <div class="form-group">
          <label>Nilai Kuantitas:</label>
          <input type="text"  class="form-control"  name="nilai_kuantitas1" >
           <input type="text"  class="form-control"  name="nilai_kuantitas2" >
            <input type="text"  class="form-control"  name="nilai_kuantitas3" >
             <input type="text"  class="form-control"  name="nilai_kuantitas4" >
        </div>
        <div class="form-group">
                   <button type="submit" name="btnlogin" class="btn btn-success btn-block" >tambah <i class="icon-circle-right2 position-right"></i></button>
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
        $('#id_semhas').on('change',function(){            
        var id_semhas=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('nilai/getok')?>",
                dataType : "JSON",
                data : {id_semhas: id_semhas},
                cache:false,
                success: function(data){
                    $.each(data,function(id_semhas,npm,pg1,pg2,$id_bimbing){
  $('[name="id_semhas"]').val(data.id_semhas);
  $('[name="id_bimbing"]').val(data.id_bimbing);
  $('[name="pb1"]').val(data.pb1);
  $('[name="pb2"]').val(data.pb2);
  $('[name="pg1"]').val(data.pg1);
  $('[name="pg2"]').val(data.pg2);
  $('[name="npm"]').val(data.npm);
                         
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>
 