 <?php if($this->session->userdata('akses') === 'operator'): ?>
 <div class="col-sm-4 col-sm-offset-4" id="bagas">
    <div class="card">

        <div class="card-header bg-primary">
          <b>Tambah Data Skripsi</b>
        </div>

        <div class="card-body">            

 <form action="" method="post"> 
              <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
               
                <?php
                echo $this->session->flashdata('msg');
                ?>
              </div>

  <div class="form-group">
    <label><b>Npm</b></label>
           <input type="text" list="searchresults" class="form-control" name="npm" id="npm" autocomplete="off" required>
           <template id="resultstemplate">
                        <?php foreach ($operator as $row):  ?>
                             <option  value="<?php echo $row->npm;?>"  ><?php echo $row->nama_mhs; ?> </option>                         
                            <?php endforeach; ?></template>
                       <datalist id="searchresults"></datalist>
                  
                    </div>  
                 <div class="form-group">
                  <label><b>Judul Skripsi</b></label>
                <textarea type="text" class="form-control" id="6" name="judul" rows="5" placeholder="Masukkan judul skripsi" required> </textarea>
                
              </div>
          
                 <div class="form-group">
          <label><b>Jenis Skripsi:</b></label>
          <select name="jenis" type="text" id="jenis"  class="form-control"  required="Pilih Jenis Skripsi">
    <option value="kualitatif"> Kualitatif</option>
    <option value=kuantitatif>Kuantitatif</option>
  
  </select>
        </div>
              <div class="form-group">
         <input type="hidden" name="tahun" class="form-control" value="<?php echo date("Y") ?>"    >
        </div>
                <div class="form-group">
                  <label><b>Lokasi Penelitian</b></label>
                <input type="text" class="form-control" name="lokasi" placeholder="Masukkan lokasi penelitian" required>
               
              </div>
            
               
                  <div class="form-group">
                    <button type="submit" name="btnlogin" class="btn btn-success btn-block">Simpan <i class="icon-circle-right2 position-right"></i></button>
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
              
         $("#6").click(function () {
        function isAcceptedUsername(npm) {
    var Regex = /[^ A1J]*A1J[^ A1J]*[0-9]{6}$/i ;
    return Regex.test(npm) ;
  }
  var npm = $("#npm").val();
             if (!isAcceptedUsername(npm)) {
    alert("Masukkan Npm dengan benar") ;
  }

            });
          });

    </script>
<script type="text/javascript">var search = document.querySelector('#npm');
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
  <div class="col-sm-4 col-sm-offset-4" id="bagas">
    <div class="card">

        <div class="card-header bg-primary">
          <b>Tambah Data Skripsi</b>
        </div>

        <div class="card-body">            

 <form action="" method="post"> 
              <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
               
                <?php
                echo $this->session->flashdata('msg');
                ?>
              </div>

  <div class="form-group">
    <label><b>NPM</b></label>
           <input type="text" value="<?php echo  $this->session->userdata('username'); ?>" readonly class="form-control" name="npm" id="npm" autocomplete="off" required>
                   
                    </div>  
                 <div class="form-group">
                  <label><b>Judul Skripsi</b></label>
                <textarea type="text" class="form-control" name="judul" id="6" rows="5" placeholder="Masukkan judul skripsi" required> </textarea>
                
              </div>
                <div class="form-group">
          <label><b>Jenis Skripsi:</b></label>
          <select name="jenis" type="text" id="jenis"  class="form-control"  required="Pilih Jenis Skripsi">
    <option value="kualitatif"> Kualitatif</option>
    <option value=kuantitatif>Kuantitatif</option>
  
  </select>
        </div>
                <div class="form-group">
                  <label><b>Lokasi Penelitian</b></label>
                <input type="text" class="form-control" name="lokasi" placeholder="Masukkan lokasi penelitian" required>
               
              </div>
            
                 <div class="form-group">
         <input type="hidden" name="tahun" class="form-control" value="<?php echo date("Y") ?>"    >
        </div>
                  <div class="form-group">
                    <button type="submit" name="btnlogin" class="btn btn-success btn-block">Simpan <i class="icon-circle-right2 position-right"></i></button>
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
              
         $("#6").click(function () {
        function isAcceptedUsername(npm) {
    var Regex = /[^ A1J]*A1J[^ A1J]*[0-9]{6}$/i ;
    return Regex.test(npm) ;
  }
  var npm = $("#npm").val();
             if (!isAcceptedUsername(npm)) {
    alert("Masukkan Npm dengan benar") ;
  }

            });
          });

    </script>
 <?php endif; ?> 