<div class="container" id="bagas">
<div class="row" >
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card">

        <div class="card-header bg-primary">
          <b>Ubah Data Seminar Proposal</b>
        </div>
        <div class="card-body">   
      <?php extract($operator); ?>
      <form method="POST" action="<?php echo base_url('berkas/eiptsemprop'); ?>/<?php echo $npm; ?>">
        
         <div class="form-group">
          <label>NPM:</label>
          <input type="text"  class="form-control" name="npm" value="<?php echo $npm; ?>" readonly required>
        </div>
        
        <div class="form-group">

          <label>Dosen Penguji Utama:</label>
         
          <select id="pg1" name="pg1" class="form-control">                            
                            <option value=""> -- Pilih Nama Dosen Penguji Utama -- </option>
                          
                           
                            <?php $no = 0; foreach ($operator1 as $row): ?>
                                <option value="<?php echo $row->nip; ?>"><?php echo $row->nip; ?></option>                            
                            <?php endforeach; ?>
                           
                            
                            
                        </select>
        </div>
        <div class="form-group">
          
          <label>Dosen Penguji Utama:</label>
         
          <select id="pg2" name="pg2" class="form-control">                            
                            <option value=""> -- Pilih Nama Dosen Penguji Pendamping -- </option>
                           
                           
                            <?php $no = 0; foreach ($operator1 as $row): ?>
                                <option value="<?php echo $row->nip; ?>"><?php echo $row->nip; ?></option>                            
                            <?php endforeach; ?>
                        </select>
        </div>
          <div class="form-group">
          <label>Ruang:</label>
          <input type="text"  class="form-control" name="ruang"  required>
        </div>
         <div class="form-group">
          <label>Tanggal:</label>
          <input type="date"  class="form-control" name="tanggal"  required>
        </div>
         <div class="form-group">
          <label>Pukul:</label>
          <input type="time"  class="form-control" name="pukul" required>
        </div>
        
        
        <button type="submit"  class="btn btn-success btn-block">  <span class="glyphicon glyphicon-check"></span> Simpan</button>
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