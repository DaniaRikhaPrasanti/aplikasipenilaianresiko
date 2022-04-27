<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <!-- <li class="sidebar-item">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li> -->

                    
                        @if($menu == 'dashboard') 
                            <li class="sidebar-item active">
                            <a href="/" class="sidebar-link ">
                        @else
                            <li class="sidebar-item ">
                            <a href="/" class='sidebar-link'>
                        @endif
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @can('sidebar-user')
                        @if($menu == 'user')
                            <li class="sidebar-item active">
                            <a href="/user" class='sidebar-link'>
                        @else  
                            <li class="sidebar-item ">
                            <a href="/user" class='sidebar-link'>
                        @endif
                                <i class="bi bi-people fill"></i>
                                <span>User</span>
                            </a>
                        </li>
                        @endcan

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-table"></i>
                                <span>Daftar Skala Nilai</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/view_skala_kemungkinan">Skala Kemungkinan Terjadinya Risiko</a>
                                    
                                </li>
                                <li class="submenu-item ">
                                    <a href="/view_skala_dampak">Skala Dampak Terjadinya Risiko</a>
                                </li>
                            </ul>
                        </li>

                        @can('sidebar-tujuanKegiatanUser')
                        @if($menu == 'daftar_tujuan_kegiatan')
                            <li class="sidebar-item active">
                            <a href="/daftarKegiatan" class='sidebar-link'>
                        @else  
                            <li class="sidebar-item ">
                            <a href="/daftarKegiatan" class='sidebar-link'>
                        @endif
                                <i class="bi bi-stack"></i>
                                <span>Daftar Tujuan Kegiatan</span>
                            </a>
                        </li>
                        @endcan

                     
                        <!-- @if($menu == 'view_keseluruhan')
                            <li class="sidebar-item active">
                            <a href="/tujuanKegiatan_view_keseluruhan" class='sidebar-link'>
                        @else  
                            <li class="sidebar-item ">
                            <a href="/tujuanKegiatan_view_keseluruhan" class='sidebar-link'>
                        @endif
                                <i class="bi bi-stack"></i>
                                <span>Tujuan Kegiatan</span>
                            </a>
                        </li> -->
                

                        @can('sidebar-tujuanKegiatan')
                        @if($menu == 'daftar_tujuan_kegiatan_admin')
                            <li class="sidebar-item active">
                            <a href="/daftarKegiatanadmin" class='sidebar-link'>
                        @else  
                            <li class="sidebar-item ">
                            <a href="/daftarKegiatanadmin" class='sidebar-link'>
                        @endif
                                <i class="bi bi-stack"></i>
                                <span>Data Tujuan Kegiatan</span>
                            </a>
                        </li>
                        @endcan

                        @if($menu == 'daftar_resiko')
                            <li class="sidebar-item active">
                            <a href="/daftarResiko" class='sidebar-link'>
                        @else  
                            <li class="sidebar-item ">
                            <a href="/daftarResiko" class='sidebar-link'>
                        @endif
                                <i class="bi bi-stack"></i>
                                <span>Daftar Risiko</span>
                            </a>
                        </li>

                        @if($menu == 'analisis_resiko')
                            <li class="sidebar-item active">
                            <a href="/analisisResiko" class='sidebar-link'>
                        @else  
                            <li class="sidebar-item ">
                            <a href="/analisisResiko" class='sidebar-link'>
                        @endif
                                <i class="bi bi-stack"></i>
                                <span>Analisis Risiko</span>
                            </a>
                        </li>

                        @if($menu == 'celah_pengendalian')
                            <li class="sidebar-item active">
                            <a href="/celahPengendalian" class='sidebar-link'>
                        @else  
                            <li class="sidebar-item ">
                            <a href="/celahPengendalian" class='sidebar-link'>
                        @endif
                                <i class="bi bi-stack"></i>
                                <span>Identifikasi Celah Pengendalian</span>
                            </a>
                        </li>

                        @if($menu == 'rtp')
                            <li class="sidebar-item active">
                            <a href="/RTP" class='sidebar-link'>
                        @else  
                            <li class="sidebar-item ">
                            <a href="/RTP" class='sidebar-link'>
                        @endif
                                <i class="bi bi-stack"></i>
                                <span>Rencana Tindak Pengendalian (RTP)</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-item">
                            <a href="/realisasiRTP" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Realisasi Pelaksanaan RTP</span>
                            </a> -->
                            <!-- <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="layout-default.html">Default Layout</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-1-column.html">1 Column</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-horizontal.html">Horizontal Menu</a>
                                </li>
                            </ul> -->
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
</div>