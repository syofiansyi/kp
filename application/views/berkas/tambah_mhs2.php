<?=$this->session->flashdata('msg') ?>
<form action="<?=base_url('berkas/tambah_mhs') ?>" method="post" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Username</td>
      <td><input type="text" name="npm" placeholder="Username bossq"></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="krs"></td>
    </tr>
    <tr>
      <tr>
      <td>Photo</td>
      <td><input type="file" name="lhs"></td>
    </tr>
    <tr>
      <td> <button type="submit" name="btnlogin" class="btn btn-success btn-block" >tambah <i class="icon-circle-right2 position-right"></i></button></td>
    </tr>
  </table>
</form>
