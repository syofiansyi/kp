<div class="container" id="bagas">
  
  <div class="row" >
   
      <div class="card">

        <div class="card-header bg-primary">
          <b>Nilai Seminar Hasil</b>
        </div>
        <div class="card-body">  
      <?php extract($operator); ?>
      <form  method="POST" action="<?php echo base_url('nilai/esemhas_nilai'); ?>/<?php echo $id_nilai; ?>">
               
                    <div class="row" id="row">
                        <div class="col-md-6">
                <div class="form-group">
                         <label>Pendahuluan:</label>
                        <input name="pendahuluan" id="nkpg1" type="number"  min="1" max="100" class="form-control" value="<?php echo $pendahuluan; ?>" onchange="nk1(this.value)"  required="Pilih Nip Dosen" />
                         
                    </div>
                </div>
       <div class="form-group">
                         
                  <input name="id_bimbing" class="form-control" type="hidden"  class="form-control" value="<?php echo $id_bimbing; ?>" />
                    </div>
                        <div class="col-md-6">
                    <div class="form-group">
                         <label>Kajian Pustaka:</label>
                        <input name="pustaka" id="nkpg2"   type="number"  min="1" max="100" class="form-control" value="<?php echo $pustaka; ?>"  required="Pilih Nip Dosen" onchange="nk2(this.value)" />
                        
                    </div>
                </div>
       
       
                        <div class="col-md-6">
                 <div class="form-group">
                         <label>Metodelogi Penelitian:</label>
                        <input  id="nkpg3" name="metopen" class="form-control" type="number"  min="1" max="100" class="form-control" value="<?php echo $metopen; ?>"  onchange="nk3(this.value)"  />
               
                    </div>
                </div>
                 <div class="col-md-6">
                 <div class="form-group">
                         <label>Hasil Dan Pembahasan :</label>
                        <input  id="nkpg4" name="hasilpem" class="form-control" type="number"  min="1" max="100" class="form-control" value="<?php echo $hasilpem; ?>"  onchange="nk4(this.value)"  />
                
                    </div>
                </div>
                 <div class="col-md-6">
                 <div class="form-group">
                         <label>Penggunaan Bahasa :</label>
                        <input  id="nkpg6" name="bahasa" class="form-control" type="number"  min="1" max="100" class="form-control" value="<?php echo $bahasa; ?>"  onchange="nk6(this.value)"  />
               
                    </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                         <label>Tata Tulis :</label>
                        <input  id="nkpg7" name="ttulis" class="form-control" type="number"  min="1" max="100" class="form-control" value="<?php echo $ttulis; ?>"   onchange="nk7(this.value)"  />
              
                    </div>
                </div>
                 <div class="col-md-6">
                 <div class="form-group">
                         <label>Penyajian Materi :</label>
                        <input  id="nkpg8" name="materi" class="form-control" type="number"  min="1" max="100" class="form-control" value="<?php echo $materi; ?>"  onchange="nk8(this.value)"  />
               
                    </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                         <label>Penguasaan Metodelogi :</label>
                        <input  id="nkpg9" name="metode" class="form-control" type="number"  min="1" max="100" class="form-control" value="<?php echo $metode; ?>"  onchange="nk9(this.value)"  />
               
                    </div>
                </div>
                 <div class="col-md-6">
                 <div class="form-group">
                         <label>Kemampuan Berargumentasi :</label>
                        <input  id="nkpg10" name="argumen" class="form-control" type="number"  min="1" max="100" class="form-control" value="<?php echo $argumen; ?>"  onchange="nk10(this.value)"  />
               
                    </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
              
                        
                        <input id="nkpg11" name="total" class="form-control" type="hidden" class="form-control"  readonly   />
               
                    </div>
                </div>
        
                     <div class="form-group">
                        
                        <input name="id_nilai" type="hidden" class="form-control" value="<?php echo $id_nilai; ?>" required="Pilih Nip Dosen" />

                    </div>
                   </div>
                  <div class="col-md-20">             
        <div id="but" class="form-group">
                    <button id="btnSubmit" name="btnlogin" type="submit"class="btn btn-success btn-block">Simpan <i class="icon-circle-right2 position-right"></i></button>
                </div>
              </div>
      </form>
    </div>
  </div>
</div>

<style type="text/css">
 #bagas {
    
    width: 100%;
}
#row{margin-left: 3%;
margin-right:3%; }
#but{margin-right: 40%;
margin-left: 40%;}
</style>
<script>
function nk1() {
  var a = document.getElementById("nkpg1").value;
  document.getElementById("nkpg1").innerHTML = $('[name="pendahuluan"]').val(a);
}
function nk2() {
   var b = document.getElementById("nkpg2").value;
  document.getElementById("nkpg2").innerHTML = $('[name="pustaka"]').val(b);
}
function nk3() {
    var c = document.getElementById("nkpg3").value;
  document.getElementById("nkpg3").innerHTML = $('[name="metopen"]').val(c);

}
function nk4() {
    var d = document.getElementById("nkpg4").value;
  document.getElementById("nkpg4").innerHTML = $('[name="hasilpem"]').val(d);

}
function nk5() {
    var e = document.getElementById("nkpg5").value;
  document.getElementById("nkpg5").innerHTML = $('[name="simpsar"]').val(e);

}
function nk6() {
    var f = document.getElementById("nkpg6").value;
  document.getElementById("nkpg6").innerHTML = $('[name="bahasa"]').val(f);

}
function nk7() {
    var g = document.getElementById("nkpg7").value;
  document.getElementById("nkpg7").innerHTML = $('[name="ttulis"]').val(g);

}
function nk8() {
    var h = document.getElementById("nkpg8").value;
  document.getElementById("nkpg8").innerHTML = $('[name="materi"]').val(h);

}
function nk9() {
    var i = document.getElementById("nkpg9").value;
  document.getElementById("nkpg9").innerHTML = $('[name="metode"]').val(i);

}
function nk10() {
    var j = document.getElementById("nkpg10").value;
  document.getElementById("nkpg10").innerHTML = $('[name="argumen"]').val(j);

}

</script>


