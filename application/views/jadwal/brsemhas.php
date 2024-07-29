<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $pageTitle; ?> |Siskrip </title>
         <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.png') ?>"/>


        <style type="text/css">
            #ketua {
             padding-top: 10%;
                padding-left: 30%;

            }
           
           
        </style>
    </head>
    <body>   
    <table id="tabe2l" width="100%">
            <tr>
                <td width=40 align="center"><img src="<?php echo base_url('assets/images/icons/unib.jpg') ?>" width="10%"></td>
                <td align="center">
                    <b><font style=font-size:12pt face="Times New Roman" color=#000000><?php echo "KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI"; ?></font></b><br/>
                    <b><font style=font-size:12pt face="Times New Roman" color=#000000><?php echo "UNIVERSITAS  BENGKULU
"; ?></font></b><br/>
 <b><font style=font-size:12pt face="Times New Roman" color=#000000><?php echo "
FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN"; ?></font></b><br/>
<b><font style=font-size:12pt face="Times New Roman" color=#000000><?php echo "
PROGRAM STUDI PENDIDIKAN NONFORMAL"; ?></font></b><br/>
                    <font style=font-size:9pt face="Times New Roman" color=#000000><?php echo "Jalan WR.Supratman Kandang Limun Bengkulu 38371A"; ?> </font><br/>
                    <font style=font-size:9pt face="Times New Roman" color=#000000><?php echo "Telepon (0736) 21170.Psw.203-232, 21186 Faksimile : (0736) 21186" ; ?>;<?php echo "Laman: www.fkip.unib.ac.id e-mail: fkip@unib.ac.id"; ?></font><br/>

                  <font style=font-size:9pt face="Times New Roman" color=#000000><?php echo "Laman: www.fkip.unib.ac.id e-mail: fkip@unib.ac.id"; ?></font><br/>
                </td>               
            </tr>
        </table>     
         <hr>      
         <p align="center"><b>BERITA ACARA UJIAN SEMINAR HASIL</b></p>
        
               <?php extract($operator); ?>  
               <?php $day = date('D', strtotime($tanggal1));
$hari = date('j', strtotime($tanggal1));
$bulan = date('M', strtotime($tanggal1));
$tahun = date('Y', strtotime($tanggal1));
$montlist = array('Jan'=>'Januari', 'Feb'=> 'Februari', 'Mar'=>'Maret', 'Apr'=>'April', 'May'=> 'Mei', 'Jun'=> 'Juni', 'Jul'=>'Juli','Aug'=> 'Agustus', 'Sep'=> 'September', 'Oct'=> 'Oktober', 'Nov'=>'November', 'Dec'=>'Desember' );
$dayList = array('Sun'=> 'Minggu',
'Mon'=>'Senin', 'Tue'=>'Selasa','Wed'=>'Rabu','Thu'=>'Kamis', 'Fri'=>'Jumat','Sat'=>'Sabtu'  );?>

               
          
          <p align="center" >Yang bertanda tangan dibawah ini penguji Seminar :
        <table align="center">
   <tr><td>1</td><td><?php echo $nama_pb1 ?></td>
 <td><?php echo": $pb1"; ?></td></tr>
 <tr><td>2</td><td><?php echo $nama_pb2 ?></td>
 <td><?php echo": $pb2"; ?></td></tr>
  <tr><td>3</td><td><?php echo $nama_pg1 ?></td><td><?php echo": $pg1"; ?></td>
  <tr><td>4</td><td><?php echo $nama_pg2 ?></td>
    <td><?php echo": $pg2"; ?> </td></tr>
    </table>
  <br><br>  
   <p style="text-align: justify; text-indent: 0.5in;">Menerangkan dengan sesungguhnya bahwa pada tanggal <?php echo"  $hari $montlist[$bulan] $tahun"; ?>pukul <?php echo substr($pukul,0,5);?> WIB sd selesai bertempat di ruang Prodi PNF FKIP UNIB.
 </p><br>



 <table align="center">
   <tr><td>Nama Mahasiswa</td>
 <td><?php echo": $nama_mhs"; ?></td></tr>
 <tr><td>Npm</td>
 <td><?php echo": $npm"; ?></td></tr>
  <tr><td>Program Studi</td><td><?php echo": Pendidikan Nonformal"; ?></td>
  <tr><td>Judul Skripsi</td>
    <td><?php echo": $judul"; ?> </td></tr>
    
 </tr></table>

 <?php $day = date('h-i-s');
$hs = date('j');
$bs = date('M');
$ts = date('Y');
$ms = array('Jan'=>'Januari', 'Feb'=> 'Februari', 'Mar'=>'Maret', 'Apr'=>'April', 'May'=> 'Mei', 'Jun'=> 'Juni', 'Jul'=>'Juli','Aug'=> 'Agustus', 'Sep'=> 'September', 'Oct'=> 'Oktober', 'Nov'=>'November', 'Dec'=>'Desember' );
$ds = array('Sun'=> 'Minggu',
'Mon'=>'Senin', 'Tue'=>'Selasa','Wed'=>'Rabu','Thu'=>'Kamis', 'Fri'=>'Jumat','Sat'=>'Sabtu'  );?>

        <table>
<tr><td align="left" width="470"></td><td align="right">Bengkulu, <?php echo"  $hs $ms[$bs] $ts"; ?></td></tr>
</table>
<table><tr><td align="left">Mengetahui :</td><td  width="502" align="right">Dewan Penguji</td> </tr>
<tr><td>Ketua Prodi,</td></tr>
</table>
<table>
    <?php extract($dosen); ?> 
<tr><td></td><td align="right"  width="550">1.........................</td></tr>
<tr><td></td></tr>
<tr><td></td><td align="right">2.........................</td></tr>
<tr><td></td></tr>
<tr><td><u><?php echo "$nama_dosen";  ?></u></td><td align="right">3.........................</td></tr>
<tr><td><?php echo "$nip";  ?></td><td align="right">4.........................</td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
</table>
<table>
  <?php

 $this->db->select_sum('total');
        $this->db->where('id_bimbing',$id_bimbing);
         $this->db->where('jenis_seminar','semhas');
$query = $this->db->get('nilai'); 
   foreach ($query->result_array() as $i) :
  $mutu=$i['total'];
                                  
  $nilai = ($mutu)/36;
    $hasil = number_format($nilai,1);
  ?>
<tr><td align="left" width="450">Total Nilai : <b><?php echo "$hasil";  ?></b></td><td align="right">Yang Bersangkutan Dinyatakan</td></tr>
</table>
<table>
<tr><td align="left" width="450">Nilai</td><td align="right">
<?php 
if ($hasil>=55)
 echo("<b>.......Lulus......</b>");
 elseif ($hasil<55)
 echo("<b>......Tidak Lulus...</b>");
?></td></tr>
<tr><td></td></tr>
<tr><td>  
   <?php   
if ($hasil>=100)
 echo("<b>.....A.....</b>");
 elseif ($hasil>=80)
 echo("<b>.....A.....</b>");
elseif ($hasil>=79)
 echo("<b>.....B.....</b>");
elseif ($hasil>=69)
 echo("<b>.....C.....</b>");
elseif ($hasil>=55)
 echo("<b>.....D.....</b>");
 else
 echo("<b>.....E.....</b>");
?></td></tr>
</table>
 <?php endforeach; ?>

        </table>
    </body>
</html>