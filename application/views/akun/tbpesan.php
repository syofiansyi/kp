
    <div class="card">

        <div class="card-header bg-primary">
          <b>Pesan</b>
        </div>

        <div class="card-body"> 
 <form action="<?=base_url('akun/tbpesan') ?>" method="post" enctype="multipart/form-data">
          
                 <?php
                echo $this->session->flashdata('msg');
                ?>


               <div class="form-group ">
                <label><b>Ke</b></label>
                <input type="text"   name="penerima" id="4"  maxlength="18" placeholder=" (Nip / Npm)" required>
               
              </div>
              <div>
                <input type="file" name="doc"  >
               
              </div>
               <div class="form-group">
              
                <input type="hidden" class="form-control"  name="" id="3" value="<?php echo $this->session->userdata('username'); ?>"  placeholder="Masukkan  Username" required>
               
              </div>
           
               <div class="form-group" >
                  <label><b>Pesan</b></label>
                <textarea type="text" class="form-control" style="text-align: justify;" name="pesan" rows="10" placeholder="Masukkan Pesan Anda" required> </textarea>
                
              </div>
                   <div id="ta" class="form-group col-md-4" >
                    <button type="submit" id="btnSubmit" name="btnlogin" class="btn btn-success btn-block">Kirim <i class="icon-circle-right2 position-right"></i></button>
                  </div>

           </form>
    </div>
  </div>
</div>
<style type="text/css">#ta {
       margin-left: 30%;
} </style>
<script type="text/javascript">
        $(function () {
     $("#btnSubmit").click(function () {
                var password = $("#3").val();
                var pas2 = $("#4").val();
                if (password == pas2) {
                    alert("Tidak bisa mengirim pesan ke username sendiri");
                    return false;
                }
                return true;

            });
        });
    </script>