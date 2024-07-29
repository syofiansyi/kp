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
          <p align="center"><b>
           Jadwal Seminar Proposal</b></p>  
 <table>

      <?php $no = 0; foreach($semprop as $row): ?>
    <tr><td><?php echo ++$no; ?></td><td>NPM</td><td><?php echo": $row->npm"; ?></td></tr>
    <tr><td></td><td>Nama</td><td><?php echo": $row->nama_mhs"; ?></td></tr>
  <tr><td></td><td>Judul</td><td><?php echo": $row->judul"; ?></td></tr>
    <tr><td></td><td>Ruang</td><td><?php echo": $row->ruang"; ?></td></tr>
      <tr><td></td><td>Tanggal</td><td><?php echo": $row->tanggal"; ?></td></tr>
        <tr><td></td><td>Pukul</td><td><?php echo": $row->pukul"; ?></td></tr>
       
            <tr><td></td><td></td></tr>
            <tr><td></td><td></td></tr>
            <tr><td></td><td></td></tr>
            <tr><td></td><td></td></tr>
  <?php endforeach; ?>
</table>

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
