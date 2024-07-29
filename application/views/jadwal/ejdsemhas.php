<div class="container" id="bagas">
  
  <div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Ubah Jadwal</b>
        </div>
        <div class="card-body">   
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('semhas/ejd_semhas'); ?>/<?php echo $id_semhas; ?>">

                <div class="form-group">
                         <label>Ruang:</label>
                        <input id="pg1" name="ruang" readonly="" type="text"class="form-control" value="<?php echo $ruang; ?>"  required="Pilih Nip Dosen" />
                         <select name="ruang" id="pb1" type="text" required="" class="form-control"  onchange="nk1(this.value)">
    <option value=""></option>
     <option value="Ruang1">Ruang 1</option>
    <option value=Ruang2>Ruang 2</option>
   
  </select>
                    </div>
                    <div class="form-group">
                         <label>Tanggal:</label>
                        <input name="tanggal1" id="tanggal" type="date"class="form-control" value="<?php echo $tanggal1; ?>"  required="Pilih Nip Dosen" />
                    </div>
                    <div class="form-group">
                         <label>Pukul:</label>
                        <input name="pukul" id="pukul" type="time"class="form-control" value="<?php echo $pukul; ?>"  required="Pilih Nip Dosen" />
                         <input type="hidden"  id="tgl" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
         
                     <div class="form-group">
                        
                        <input name="id_semhas" type="hidden" class="form-control" value="<?php echo $id_semhas; ?>" readonly="" required="Pilih Nip Dosen" />
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
<script>
function nk1() {
  var a = document.getElementById("pb1").value;
  document.getElementById("pg1").innerHTML = $('[name="ruang"]').val(a);
}
</script>
<script type="text/javascript">
        $(function () {
       
          $("#pukul").click(function () {
               var tgl = $("#tgl").val();
                var tanggal = $("#tanggal").val();
                if (tanggal < tgl) {
                    alert("Tanggal sudah lewat ");
                    return false;
                }
                return true;

            });
        
          });

    </script>