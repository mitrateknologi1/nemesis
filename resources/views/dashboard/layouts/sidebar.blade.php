 <!-- Sidebar -->
 <div class="sidebar sidebar-style-2">
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <div class="user">
                 <div class="avatar-sm float-left mr-2">
                     <img src="{{ asset('assets/dashboard') }}/img/profile.jpg" alt="..."
                         class="avatar-img rounded-circle">
                 </div>
                 <div class="info">
                     <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                         <span>
                             Hizrian
                             <span class="user-level">Administrator</span>
                             <span class="caret"></span>
                         </span>
                     </a>
                     <div class="clearfix"></div>

                     <div class="collapse in" id="collapseExample">
                         <ul class="nav">
                             <li>
                                 <a href="#profile">
                                     <span class="link-collapse">My Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#edit">
                                     <span class="link-collapse">Edit Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#settings">
                                     <span class="link-collapse">Settings</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <ul class="nav nav-primary">
                 <li class="nav-item" id="nav-dashboard">
                     <a href="{{ url('/') }}">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Intervensi</h4>
                 </li>
                 <li class="nav-item" id="nav-perencanaan">
                     <a data-toggle="collapse" href="#perencanaan">
                         <i class="fas fa-layer-group"></i>
                         <p>Perencanaan</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="perencanaan">
                         <ul class="nav nav-collapse">
                             <li id="li-keong">
                                 <a href="{{ url('rencana-intervensi-keong') }}">
                                     <span class="sub-item">Keong</span>
                                 </a>
                             </li>
                             <li id="li-manusia">
                                 <a href="components/buttons.html">
                                     <span class="sub-item">Manusia</span>
                                 </a>
                             </li>
                             <li id="li-hewan">
                                 <a href="components/gridsystem.html">
                                     <span class="sub-item">Hewan</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="collapse" href="#realisasi">
                         <i class="fas fa-layer-group"></i>
                         <p>Realisasi</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="realisasi">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="components/avatars.html">
                                     <span class="sub-item">Keong</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="components/buttons.html">
                                     <span class="sub-item">Manusia</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="components/gridsystem.html">
                                     <span class="sub-item">Hewan</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Hasil Realisasi</h4>
                 </li>
                 <li class="nav-item">
                     <a href="projects.html">
                         <i class="fas fa-users"></i>
                         <p>Manusia</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="projects.html">
                         <i class="fas fa-paw"></i>
                         <p>Hewan</p>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </div>
 <!-- End Sidebar -->
