 <aside id="leftsidebar" class="sidebar">
     <!-- User Info -->
     <div class="user-info">
         <div class="image">
             <img src="{{ Storage::disk('public')->url('profile/'.Auth::user()->image) }}" width="48" height="48" alt="User" />
         </div>
         <div class="info-container">
             <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
             <div class="email">{{ Auth::user()->email }}</div>
             <div class="btn-group user-helper-dropdown">
                 <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                 <ul class="dropdown-menu pull-right">
                     <li>
                         <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             <i class="material-icons">input</i> Log Out
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <!-- #User Info -->
     <!-- Menu -->
     <div class="menu">
         <ul class="list">
             <li class="header">MAIN NAVIGATION</li>

             @if (Request::is('admin*'))
             <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                 <a href="{{ url('admin/dashboard') }}">
                     <i class="material-icons">dashboard</i>
                     <span>Dashboard</span>
                 </a>
             </li>   

              <li class="{{ Request::is('admin/banners*') ? 'active' : '' }}">
                 <a href="{{ url('admin/banners') }}">
                     <i class="material-icons">dashboard</i>
                     <span>Banner</span>
                 </a>
             </li> 

             <li class="{{ Request::is('admin/about*') ? 'active' : '' }}">
                 <a href="{{ url('admin/about') }}">
                     <i class="material-icons">dashboard</i>
                     <span>About</span>
                 </a>
             </li>
              <li class="{{ Request::is('admin/portfolio*') ? 'active' : '' }}">
                 <a href="{{ url('admin/portfolio') }}">
                     <i class="material-icons">category</i>
                     <span>Portfolio</span>
                 </a>
             </li> 

             <li class="{{ Request::is('admin/blog*') ? 'active' : '' }}">
                 <a href="{{ url('admin/blog') }}">
                     <i class="material-icons">category</i>
                     <span>Blog</span>
                 </a>
             </li>   
              <li class="{{ Request::is('admin/contact/show*') ? 'active' : '' }}">
                 <a href="{{ url('admin/contact/show') }}">
                     <i class="material-icons">contacts</i>
                     <span>Contact</span>
                 </a>
             </li>     
            
             <li>
                 <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                     <i class="material-icons">input</i>
                     <span> Log Out </span>
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
             </li>


             @endif

             @if (Request::is('author*'))
             <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}">
                  <a href="{{ url('author/dashboard') }}">
                     <i class="material-icons">dashboard</i>
                     <span>Dashboard</span>
                 </a>
             </li>
        
             <li>
                 <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                     <i class="material-icons">input</i>
                     <span> Log Out </span>
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
             </li>
             @endif



         </ul>
     </div>
     <!-- #Menu -->
     <!-- Footer -->
     <div class="legal">
         <div class="copyright">
             &copy; 2021 - 2022 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
         </div>
         <div class="version">
             <b>Version: </b> 1.0.5
         </div>
     </div>
     <!-- #Footer -->
 </aside>
