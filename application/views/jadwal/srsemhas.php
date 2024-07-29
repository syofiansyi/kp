<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $pageTitle; ?> | Siskrip </title>
         <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.png') ?>"/>


        <style type="text/css">
            #ketua {
             padding-top: 40%;
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
         
         <table  cellpadding="3">
            <tr>
               <?php extract($operator); ?>  
               
               
             <td>Nomor</td>
             <td>:           /UN30......../UND/PNF/<?php echo date('Y') ?> </td>
           </tr>
             <tr>
             <td>Lamp </td>
             <td>: -</td>
             <tr><td>Hal</td>
              <td>: Undangan Seminar Hasil</td></tr>
            </tr>
          </table>
          <br><br>
          <table>
            <tr><td>Yth. Dosen Prodi PNF……………………………….</td>
              <td></td></tr>
              <tr><td>FKIP Universitas Bengkulu</td></tr>
           
        </table> <br><br>  
   <p style="text-align: justify; text-indent: 0.5in;">Sehubungan dengan akan diadakannya  Seminar Hasil mahasiswa program studi S1 Pendidikan Nonformal FKIP Universitas Bengkulu, dengan ini diharapkan kehadirannya pada :
 </p><br><br>
<?php $day = date('D', strtotime($tanggal1));
$hari = date('j', strtotime($tanggal1));
$bulan = date('M', strtotime($tanggal1));
$tahun = date('Y', strtotime($tanggal1));
$montlist = array('Jan'=>'Januari', 'Feb'=> 'Februari', 'Mar'=>'Maret', 'Apr'=>'April', 'May'=> 'Mei', 'Jun'=> 'Juni', 'Jul'=>'Juli','Aug'=> 'Agustus', 'Sep'=> 'September', 'Oct'=> 'Oktober', 'Nov'=>'November', 'Dec'=>'Desember' );
$dayList = array('Sun'=> 'Minggu',
'Mon'=>'Senin', 'Tue'=>'Selasa','Wed'=>'Rabu','Thu'=>'Kamis', 'Fri'=>'Jumat','Sat'=>'Sabtu'  );?>



 <table>
 	 <tr><td>Nama</td>
 <td><?php echo": $nama_mhs"; ?></td></tr>
 <tr><td>Npm</td>
 <td><?php echo": $npm"; ?></td></tr>
  <tr><td>Hari/Tanggal</td><td><?php echo": $dayList[$day]"; ?><?php echo" / $hari $montlist[$bulan] $tahun"; ?></td>
  <tr><td>Pukul</td>
    <td><?php echo": $pukul WIB s.d selesai (Jadwal Terlampir)"; ?> </td></tr>
    <tr><td>Tempat</td>
      <td><?php echo": $ruang"; ?></td></tr>
      <tr><td>Acara</td><td> <?php echo": Seminar Hasil"; ?></td></tr>
 </tr></table>
        <table border=0 cellspacing=0 cellpadding=0 id="ketua">
            <tr height=17 >
                <td width=430  align=left > <br></td>
                <td width=270  align=center  bgcolor=#ffffff ><font style=font-size:16pt face="arial narrow" color=#000000>Ketua Prodi,</font></td>
            </tr>
            <br><br><br><br>
            <?php extract($dosen); ?> 
            <tr height=17  >
                <td width=430   align=left > <br></td>
                <td width=270  align=center  bgcolor=#ffffff ><b><u><font style=font-size:14pt face="times new roman" color=#000000> <?php echo "$nama_dosen";  ?></font></b></u></td>
            </tr>
            <tr height=17 >
                <td width=430  align=left > <br></td>
                <td width=270  align=center   bgcolor=#ffffff ><font style=font-size:14pt face="times new roman" color=#000000>  
                <?php echo "$nip";  ?> </font></td>

            </tr>
        </table>
    </body>
</html>
