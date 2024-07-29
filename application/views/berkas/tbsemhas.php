<?php if($this->session->userdata('akses') === 'operator'): ?>
<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-12 col-sm-offset-12">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Tambah Berkas Seminar Hasil</b>
        </div>
        <div class="card-body">   
    
     <form action="<?=base_url('berkas/tbsemhas') ?>" method="post" enctype="multipart/form-data">
                     <div class="row" id="row">
                        <div class="col-md-6">  
                    <div class="form-group">
                        <label for="id_bimbing" class="form-control-label"> Judul :</label>
         
                       <input  type="text" name="" id="id_bimbing" class="form-control" required="" placeholder="Gunakan NPM untuk mencari ID" list="searchresults" autocomplete="off" />
                       <template id="resultstemplate">
                        <?php foreach ($operator as $row):  ?>
                            <option value="<?php echo $row->id_bimbing; ?>"><?php echo $row->id_bimbing; ?>. <?php echo substr($row->judul,0 , 60);?></option>                            
                            <?php endforeach; ?></template>
                       <datalist id="searchresults"></datalist>
                 </div>
                  </div>
                   <div class="col-md-6"> 
               <div class="form-group">
                        <label for="NPM" class="form-control-label"> NPM :</label>
         
                        <input  id="npm" name="npm" class="form-control" value="" readonly/>
                    </div>
                  </div>
                     <div class="form-group">
                       
                        <input  type="hidden" name="id_syarat" class="form-control" value="" readonly/>
                    </div>
       
         <div class="col-md-6">
         <div class="form-group">
          <label>File Skripsi:</label>
          <input type="file"  class="form-control" required="" name="fileskrip" >
          <button type="submit"  name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Kartu Bimbingan:</label>
          <input disabled type="file"  class="form-control"  name="kbskrip" >          
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Surat Izin Seminar:</label>
          <input disabled type="file"  class="form-control"  name="sizin" >          
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Bukti UKT:</label>
          <input disabled type="file"  class="form-control"  name="ukt" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
    
       <div class="col-md-6">
         <div class="form-group">
          <label>Transkrip:</label>
          <input disabled type="file"  class="form-control"  name="transkrip" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
     
       <div class="col-md-6">
         <div class="form-group">
          <label>LHS:</label>
          <input disabled type="file"  class="form-control"  name="lhs" >          
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>KRS:</label>
          <input disabled type="file"  class="form-control"  name="krs" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Ijazah:</label>
          <input disabled type="file"  class="form-control"  name="ijazah" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>NIM SMA:</label>
          <input disabled type="file"  class="form-control"  name="nim" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Foto:</label>
          <input disabled type="file"  class="form-control"  name="foto" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
    
       <div class="form-group">
         <input  type="hidden" name="tahun" class="form-control" value="<?php echo date("Y") ?>"    >
        </div>
         <div class="col-md-6">
       
                  
      </form>
    </div>
  </div>
</div>
<style type="text/css">
 #but {
    
    width: 100%;
}
</style>
  <script type="text/javascript">    
    $(document).ready(function(){        
        $('#id_bimbing').on('change',function(){            
        var id_bimbing=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('berkas/getsemhas')?>",
                dataType : "JSON",
                data : {id_bimbing: id_bimbing},
                cache:false,
                success: function(data){
                    $.each(data,function(id_bimbing,npm){
                      
                        
                           $('[name="npm"]').val(data.npm);
                         $('[name="id_syarat"]').val(data.id_bimbing+('a'));
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>
<script type="text/javascript">var search = document.querySelector('#id_bimbing');
var results = document.querySelector('#searchresults');
var templateContent = document.querySelector('#resultstemplate').content;
search.addEventListener('keyup', function handler(event) {
    while (results.children.length) results.removeChild(results.firstChild);
    var inputVal = new RegExp(search.value.trim(), 'i');
    var set = Array.prototype.reduce.call(templateContent.cloneNode(true).children, function searchFilter(frag, item, i) {
        if (inputVal.test(item.textContent) && frag.children.length < 5) frag.appendChild(item);
        return frag;
    }, document.createDocumentFragment());
    results.appendChild(set);
});</script>
<?php endif; ?> 

<?php if($this->session->userdata('akses') === 'mahasiswa'): ?>
<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-12 col-sm-offset-12">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Tambah Berkas Seminar Hasil</b>
        </div>
        <div class="card-body">   
    
     <form action="<?=base_url('berkas/tbsemhas') ?>" method="post" enctype="multipart/form-data">
                     <div class="row" id="row">
                        <div class="col-md-6">  
                    <div class="form-group">
                        <label for="id_bimbing" class="form-control-label"> Judul :</label>
                           <select type="text" name="" id="id_bimbing" required="" class="form-control">
                             <option value=""></option>
                 <?php foreach ($mahasiswa as $row):  ?>
                             <option value="<?php echo $row->id_bimbing; ?>"><?php echo $row->id_bimbing; ?>. <?php echo substr($row->judul,0 , 60);?></option>                              
                            <?php endforeach; ?>
                  </select>
                 </div>
                  </div>
                   <div class="col-md-6"> 
               <div class="form-group">
                        <label for="NPM" class="form-control-label"> NPM :</label>
         
                        <input  id="npm" name="npm" class="form-control" value="" readonly/>
                    </div>
                  </div>
                     <div class="form-group">
                       
                        <input  type="hidden" name="id_syarat" class="form-control" value="" readonly/>
                    </div>
       
         <div class="col-md-6">
         <div class="form-group">
          <label>File Skripsi:</label>
          <input  type="file"  class="form-control"  name="fileskrip" >
          <button type="submit"  name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Kartu Bimbingan:</label>
          <input disabled type="file"  class="form-control" name="kbskrip" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Surat Izin Seminar:</label>
          <input disabled type="file"  class="form-control"  name="sizin" >          
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Bukti UKT:</label>
          <input disabled type="file"  class="form-control"  name="ukt" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
    
       <div class="col-md-6">
         <div class="form-group">
          <label>Transkrip:</label>
          <input disabled type="file"  class="form-control"  name="transkrip" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
      
       <div class="col-md-6">
         <div class="form-group">
          <label>LHS:</label>
          <input disabled type="file"  class="form-control"  name="lhs" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>KRS:</label>
          <input disabled type="file"  class="form-control"  name="krs" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Ijazah:</label>
          <input disabled type="file"  class="form-control"  name="ijazah" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>NIM SMA:</label>
          <input disabled type="file"  class="form-control"  name="nim" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Foto:</label>
          <input disabled type="file"  class="form-control"  name="foto" >
          <button type="submit" disabled name="btnlogin" class="form-control btn btn-warning"><i class="fa fa-upload">Upload</i>&nbsp; </button>
        </div>
      </div>
   
       <div class="form-group">
         <input  type="hidden" name="tahun" class="form-control" value="<?php echo date("Y") ?>"    >
        </div>
         <div class="col-md-6">
       
                  
      </form>
    </div>
  </div>
</div>
<style type="text/css">
 #but {
    
    width: 100%;
}
</style>
  <script type="text/javascript">    
    $(document).ready(function(){        
        $('#id_bimbing').on('change',function(){            
        var id_bimbing=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('berkas/getsemhas')?>",
                dataType : "JSON",
                data : {id_bimbing: id_bimbing},
                cache:false,
                success: function(data){
                    $.each(data,function(id_bimbing,npm){
                      
                        
                           $('[name="npm"]').val(data.npm);
                         $('[name="id_syarat"]').val(data.id_bimbing+('a'));
                        
                                      
                    });                    
                }
            });
            return false;
        });
    });
</script>
<script type="text/javascript">var search = document.querySelector('#id_bimbing');
var results = document.querySelector('#searchresults');
var templateContent = document.querySelector('#resultstemplate').content;
search.addEventListener('keyup', function handler(event) {
    while (results.children.length) results.removeChild(results.firstChild);
    var inputVal = new RegExp(search.value.trim(), 'i');
    var set = Array.prototype.reduce.call(templateContent.cloneNode(true).children, function searchFilter(frag, item, i) {
        if (inputVal.test(item.textContent) && frag.children.length < 5) frag.appendChild(item);
        return frag;
    }, document.createDocumentFragment());
    results.appendChild(set);
});</script>
<?php endif; ?> 