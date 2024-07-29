            <div class="main-container">
                <div class="sidebar">
                    <nav class="sidebar-nav">
                        <ul class="nav">
                            <li class="nav-title">Menu</li>

                            <li class="nav-item">
                                <a href="<?php echo site_url('akun/dashboard'); ?>" class="nav-link">
                                    <i class="icon icon-speedometer"></i>Halaman Utama
                                </a>
                            </li>

                          <?php if($this->session->userdata('akses') === 'operator'): ?>
                                <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-people"></i>Akun <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('akun'); ?>" class="nav-link">
                                                <i class="icon icon-user-following"></i>Mahasiswa
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('akun/dosen'); ?>" class="nav-link">
                                                <i class="icon icon-user-follow"></i>Dosen
                                            </a>
                                        </li>

                                    </ul>
                                </li>  
                                <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-layers"></i>Berkas <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('skripsi'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Judul
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('berkas'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Proposal
                                            </a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="<?php echo site_url('berkas/semhas'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Seminar Hasil
                                            </a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="<?php echo site_url('berkas/sidang'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Sidang 
                                            </a>
                                        </li>

                                    </ul>
                                </li>  
                                  <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-people"></i> Status Dosen <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('Stsdosen'); ?>" class="nav-link">
                                                <i class="icon icon-user-following"></i>Dosen Pembimbing
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('Stsdosen/penguji'); ?>" class="nav-link">
                                                <i class="icon icon-user-follow"></i>Dosen Penguji
                                            </a>
                                        </li>

                                    </ul>
                                </li>   
                                  <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-clock"></i>Jadwal Seminar <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('semprop'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Seminar Proposal
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('semhas'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Seminar Hasil
                                            </a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="<?php echo site_url('sidang'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Sidang SKRIPSI
                                            </a>
                                        </li>
                                         

                                    </ul>
                                </li>      
                                <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-graph"></i>Nilai <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('nilai'); ?>" class="nav-link">
                                                <i class="icon icon-graph"></i>Seminar Proposal
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('nilai/nlsemhas'); ?>" class="nav-link">
                                                <i class="icon icon-graph"></i>Seminar Hasil
                                            </a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="<?php echo site_url('nilai/nlsidang'); ?>" class="nav-link">
                                                <i class="icon icon-graph"></i>Sidang SKRIPSI
                                            </a>
                                        </li>

                                    </ul>
                                </li> 
                                                  
                              <?php endif; ?>   
                            

                            <?php if($this->session->userdata('level') === '2'): ?>
                                 
                               <li class="nav-item">
                                 <a href="<?php echo site_url('skripsi'); ?>" class="nav-link">
                                        <i class="icon icon-layers"></i> Judul
                                    </a>
                            </li> 
                                <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-layers"></i>Berkas Seminar <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('berkas'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Seminar Proposal
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('berkas/semhas'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Seminar Hasil
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('berkas/sidang'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Sidang Skripsi
                                            </a>
                                        </li>
                                    </ul>
                                    <li class="nav-item">
                                            <a href="<?php echo site_url('Stsdosen'); ?>" class="nav-link">
                                                <i class="icon icon-user-unfollow"></i>Dosen Pembimbing
                                            </a>
                                        </li>
                                </li>     
                                 <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-clock"></i>Jadwal Seminar <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('semprop'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Seminar Proposal
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('semhas'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Seminar Hasil
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('sidang'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Sidang Skripsi
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </li>   
                                <li class="nav-item">
                                <a href="<?php echo site_url('nilai'); ?>" class="nav-link">
                                    <i class="icon icon-info"></i>Pengumuman
                                </a>
                            </li>     
                                                        
                            <?php endif; ?>  
                                                      
                           <?php if($this->session->userdata('level') === '1'): ?>
                                 
                               <li class="nav-item">
                                 <a href="<?php echo site_url('akun/blm_verif'); ?>" class="nav-link">
                                        <i class="icon icon-layers"></i> Matkul
                                    </a>
                            </li> 
                                
                                                        
                            <?php endif; ?>  
                            <?php if($this->session->userdata('akses') === 'dosen'): ?>
                                 <?php if($this->session->userdata('dosen') === '2'): ?>
                                 <li class="nav-item">
                                   <a href="<?php echo site_url('skripsi'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Judul
                                            </a>
                                </li>
                                 <?php endif; ?>
                                <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-people"></i>Data Dosen <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('Stsdosen'); ?>" class="nav-link">
                                                <i class="icon icon-user-following"></i>Dosen Pembimbing
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('Stsdosen/penguji'); ?>" class="nav-link">
                                                <i class="icon icon-user-follow"></i>Dosen Penguji
                                            </a>
                                        </li>

                                        
                                    </ul>
                                    
                                </li>     
                                
                                <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-clock"></i>Jadwal Seminar <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('semprop'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Seminar Proposal
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('semhas'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Seminar Hasil
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('sidang'); ?>" class="nav-link">
                                                <i class="icon icon-clock"></i>Sidang Skripsi
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </li>   
                                <li class="nav-item nav-dropdown">
                                    <a href="#" class="nav-link nav-dropdown-toggle">
                                        <i class="icon icon-layers"></i>Nilai <i class="fa fa-caret-left"></i>
                                    </a>

                                    <ul class="nav-dropdown-items">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('nilai'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Seminar Proposal
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('nilai/nlsemhas'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Seminar Hasil
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('nilai/nlsidang'); ?>" class="nav-link">
                                                <i class="icon icon-layers"></i>Sidang Skripsi
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </li>       
                            <?php endif; ?>

                        </ul>
                    </nav>
                </div>