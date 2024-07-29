<div class="container" id="bagas">
  
<div class="row" >
  <div class="col-sm-12 col-sm-offset-12">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Sidang Skripsi</b>
        </div>
        <div class="card-body">  

      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('berkas/iptsidang'); ?>/<?php echo $id_syarat; ?>">
         <div class="row" id="row">
          <div class="col-md-6">
         <div class="form-group">
          <label>NPM:</label>
          <input type="text"  class="form-control" name="npm" value="<?php echo $npm; ?>" readonly required>
        </div>
      </div>
        <div class="form-group">
        
          <input type="hidden"  class="form-control" name="id_sidang" value="<?php echo $id_syarat; ?>" readonly required>
        </div>
        <div class="form-group">
           <?php 
      $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->where('id_bimbing',$id_syarat);
        $this->db->order_by('id_bimbing', 'DESC');
        $query = $this->db->get();
               
                  foreach ($query->result_array() as $i) :
                      $npm=$i['npm'];
                       $id_bimbing=$i['id_bimbing'];
                        $pb1=$i['pb1'];
                          $pb2=$i['pb2'];
                    
              ?>
          
          <input type="hidden"  class="form-control" name="id_bimbing"  value="<?php echo $id_bimbing; ?>" readonly required>
           <input type="hidden" id="pb1" class="form-control"  value="<?php echo $pb1; ?>" readonly required>
           <input type="hidden" name="dipt" class="form-control" value="<?php echo $pb2; ?>" readonly required>
            <input type="hidden" id="pb2"  class="form-control" value="<?php echo $pb2; ?>" readonly required> <?php endforeach;?>
        </div>


 <div class="col-md-6">
        
      
          <div class="form-group">

          <label>Dosen Penguji Utama:</label>
         
          
          <input type="text" name="pg1" id="pg1" class="form-control"  placeholder="Gunakan Nama Dosen Untuk NIP" list="searchresults" autocomplete="off" />                   
                             <template id="resultstemplate">
                        <?php foreach ($operator1 as $row):  ?>
                            <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_dosen; ?></option>                            
                            <?php endforeach; ?></template>
                       <datalist id="searchresults"></datalist>
                            
                            
                       
        </div>
        </div>
         <div class="col-md-6">
        <div class="form-group">
          
          <label>Dosen Penguji Pendamping:</label>
         
         <input type="text" name="pg2" id="pg2" class="form-control"  placeholder="Gunakan Nama Dosen Untuk NIP" list="data_mahasiswa" autocomplete="off" />                   
                             <template id="cari">
                        <?php foreach ($operator1 as $row):  ?>
                            <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_dosen; ?></option>                            
                            <?php endforeach; ?></template>
                       <datalist id="data_mahasiswa"></datalist>
        </div>
      </div>
         <div class="col-md-6">
        <div class="form-group">
          <label>Ruang:</label>
    <select name="ruang" type="text" id="6"  class="form-control" autocomplete="off" required>
    <option value="Ruang1">Ruang 1</option>
    <option value=Ruang2>Ruang 2</option>
   
  </select>
        </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
          <label>Tanggal:</label>
         <input type="date"  id="tanggal" class="form-control" name="tanggal3" required>
           <input type="hidden"  id="tgl" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
          <label>Pukul:</label>
          <input type="time" id="pukul" class="form-control" name="pukul" required>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
                        
                        <input type="hidden" name="nama_pg1" class="form-control" value="" readonly="" required="" />
                    </div>
                     <div class="form-group">
                        
                        <input type="hidden" name="nama_pg2" class="form-control"  value="" readonly required="" />
                    </div>
                  </div>
                  <div class="col-md-6" id="but" >
        <div class="form-group">
        <button type="submit" id="btnlogin"  name="btnlogin" class="btn btn-success btn-block">  <span class="glyphicon glyphicon-check"></span> Simpan</button>
      </div>
    </div>
  </div>
      </form>
    </div>
  </div>
</div>

   <style type="text/css">
 #bagas {
    
   width: 100%;
    padding-left: 5%;
}
#but{margin-right: 30%;
margin-left: 30%;
}
</style>
<script type="text/javascript">
        $(function () {
            $("#btnlogin").click(function () {
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
        $('#pg2').on('change',function(){            
        var pg2=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('berkas/get_nmdosen')?>",
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
<script type="text/javascript">    
    $(document).ready(function(){        
        $('#pg1').on('change',function(){            
        var pg1=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('berkas/get_nmdosen')?>",
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
<script type="text/javascript">var search = document.querySelector('#pg1');
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

<script type="text/javascript">var dataid = document.querySelector('#pg2');
var datalis = document.querySelector('#data_mahasiswa');
var cari = document.querySelector('#cari').content;
dataid.addEventListener('keyup', function handler(event) {
    while (datalis.children.length) datalis.removeChild(datalis.firstChild);
    var inputVal = new RegExp(dataid.value.trim(), 'i');
    var set = Array.prototype.reduce.call(cari.cloneNode(true).children, function dataidFilter(frag, item, i) {
        if (inputVal.test(item.textContent) && frag.children.length < 5) frag.appendChild(item);
        return frag;
    }, document.createDocumentFragment());
    datalis.appendChild(set);
});</script>
<script type="text/javascript">
        $(function () {
         $("#pg2").click(function () {
        function isAcceptedUsername(pg1) {
    var Penguji = /[^ 19]*19[^ 19]*[0-9]{16}$/i ;
    return Penguji.test(pg1) ;
  }
  var pg1 = $("#pg1").val();
             if (!isAcceptedUsername(pg1)) {
    alert("Masukkan Nip Dosen Penguji Utama dengan benar") ;
  }

            });
          $("#pukul").click(function () {
               var tgl = $("#tgl").val();
                var tanggal = $("#tanggal").val();
                if (tanggal < tgl) {
                    alert("Tanggal sudah lewat ");
                    return false;
                }
                return true;

            });
          $("#6").click(function () {
        function isAcceptedUsername(pg2) {
    var Regex = /[^ 19]*19[^ 19]*[0-9]{16}$/i ;
    return Regex.test(pg2) ;
  }
  var pg2 = $("#pg2").val();
             if (!isAcceptedUsername(pg2)) {
    alert("Masukkan Nip Dosen Penguji Pendamping dengan benar") ;
  }

            });
          });

    </script>