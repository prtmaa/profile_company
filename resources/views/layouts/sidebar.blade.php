<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('image/icon.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="{{url('dashboard')}}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('about')}}" class="nav-link active">
                    <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Settings
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{url('slider')}}" class="nav-link active">
                    <i class="nav-icon fas fa-pen"></i>
                  <p>
                    Sliders
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{url('fitur')}}" class="nav-link active">
                    <i class="nav-icon fas fa-plus"></i>
                  <p>
                    Fitur
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{url('pesan')}}" class="nav-link active">
                    <i class="nav-icon fas fa-envelope"></i>
                  <p>
                    Pesan
                  </p>
                </a>
              </li>


              <form action="/logout" method="post">
                @csrf
              <li class="nav-item mt-2">
                <button type="submit" href="#" class="nav-link active">
                    <i class="nav-icon fas fa-right-from"></i>
                  <p>
                    Logout
                  </p>
                </button>
              </li>
            </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 
  