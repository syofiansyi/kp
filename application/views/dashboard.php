
<div class="row">
    <div class="col-md-12">    
        <div class="alert alert-dismissible alert-success">Halo <?php echo $this->session->userdata('nama'); ?>. Selamat Datang Di Sistem Informasi Skripsi Program Studi Pendidikan Non Formal.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>    
    </div>
     <div><div class="col-md-12"><p align="center"><b><font size="4">SEJARAH SINGKAT PROGRAM STUDI PENDIDIKAN NONFORMAL</font></b></p><p style="text-align: justify; text-indent: 0.5in;"><font size="3">
Program studi S1 Pendidikan Nonformal FKIP Universitas Bengkulu berdiri berdasarkan pada Surat Keputusan Direktur Jenderal Pendidikan Tinggi Kementerian Pendidikan dan Kebudayaan RI. : Nomor 775/D/T/2002, pada SK tersebut ditetapkan nama program studi yaitu Pendidikan Luar Sekolah. Penyelenggaraan program studi Pendidikan Luar Sekolah dimulai pada Tanggal 23 April 2002.  
Sesuai dengan perkembangan ilmu dan kebutuhan Stake Holder pada tahun 2014 Derektur Pembelajran dan Kemahasiswaan Derektorat Jenderal Pendidikan Tinggi Kementrian Pendidikan dan Kebudayaan RI melalui suratnya Nomor : 2300/E3/2014 Tanggal 28 Mei 2014 prihal tentang perubahan nomenkelatur program studi, meminta Rektor Universitas Bengkulu mengirimkan Perubahan Nomenkelatur Program Studi, pada surat Rektor Universitas Bengkulu Nomor : 6290/UN30/EP/2014 diusulkan nama program studi Pendidikan Luar Sekolah menjadi Program Studi Pendidikan Nonformal.
Kemudian Berdasarkan SK Rektor Universitas Bengkulu Nomor 1944/UN30/HK/2017 Tanggal 24 Oktober 2017 Tentang Penamaan Program Studi Dan Penulisan Gelar Lulusan Program Studi Program Prndidikan Vokasi, Pendidikan Akademik, Dan Pendidikan Profesi Selingkung Universitas Bengkulu. Di tetapkan nama program studi Pendidikan Luar Sekolah menjadi Pendidikan Nonformal.</font></p></div><br><br></div>
     <?php if($this->session->userdata('akses') === 'operator'): ?>    
       
    <div class="col-md-6">
        <div class="card p-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                   
                        <span class="h4 d-block font-weight-normal mb-2"  ><?php echo $mahasiswa; ?></span>
                        <span class="font-weight-light">Mahasiswa Yang Terdaftar</span>
                    </a>
                </div>
                <div class="h2 text-muted">
                    
                        <i class="icon icon-people"></i>
                  
                </div>
            </div>
        </div>
    </div>    
<div class="col-md-6">
        <div class="card p-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
              
                        <span class="h4 d-block font-weight-normal mb-2"><?php echo $dosen; ?></span>
                        <span class="font-weight-light">Dosen Yang Terdaftar</span>
                    </a>
                </div>

                <div class="h2 text-muted">
                   
                        <i class="icon icon-people"></i>
                 
                </div>
            </div>
        </div>
    </div>    


    
    <?php endif; ?>

   
    <?php if($this->session->userdata('akses') === 'mahasiswa'): ?>
    <div class="col-md-6">
        <div class="card p-4" >
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                   
                        <span class="h4 d-block font-weight-normal mb-2"><?php echo $mahasiswa; ?></span>
                        <span class="font-weight-light">Mahasiswa Yang Terdaftar</span>
                    </a>
                </div>

                <div class="h2 text-muted">
                  
                        <i class="icon icon-people"></i>
                   
                </div>
            </div>
        </div>
    </div>
     <div class="col-md-6">
        <div class="card p-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                 
                        <span class="h4 d-block font-weight-normal mb-2"  ><?php echo $dosen; ?></span>
                        <span class="font-weight-light"> Dosen Yang Terdaftar</span>
                    </a>
                </div>

                <div class="h2 text-muted">
                
                        <i class="icon icon-people"></i>

                </div>
            </div>
        </div>
    </div>    
  <?php endif; ?>
  <?php if($this->session->userdata('akses') === 'dosen'): ?>    
    <div class="col-md-6">
        <div class="card p-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>

                        <span class="h4 d-block font-weight-normal mb-2"  ><?php echo $mahasiswa; ?></span>
                        <span class="font-weight-light">Mahasiswa Yang Terdaftar</span>
                    </a>
                </div>

                <div class="h2 text-muted">
                
                        <i class="icon icon-people"></i>

                </div>
            </div>
        </div>
    </div>    
<div class="col-md-6">
        <div class="card p-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
               
                        <span class="h4 d-block font-weight-normal mb-2"><?php echo $dosen; ?></span>
                        <span class="font-weight-light">Dosen Yang Terdaftar</span>
                    </a>
                </div>

                <div class="h2 text-muted">
                  
                        <i class="icon icon-people"></i>
                  
                </div>
            </div>
        </div>
    </div>    


    
    <?php endif; ?>
