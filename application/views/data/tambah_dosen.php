 <form action="" method="post">
            <div class="panel panel-body login-form">
              <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">Tambah Dosen</h5>
                <?php
                echo $this->session->flashdata('msg');
                ?>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
              </div>
              <div class="form-group has-feedback has-feedback-left">
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                <div class="form-control-feedback">
                   <i class="icon-user text-muted"></i>
                </div>
              </div>
               <div class="form-group has-feedback has-feedback-left">
                <input type="password" class="form-control" name="password2" placeholder="Masukkan Password" required>
                <div class="form-control-feedback">
                   <i class="icon-user text-muted"></i>
                </div>
              </div>
                  <div class="form-group">
                    <button type="submit" name="btnlogin" class="btn btn-primary btn-block" style="background-color:orange;border:1px solid #f1f1f1;">tambah <i class="icon-circle-right2 position-right"></i></button>
                  </div>

             

            </div>
          </form>