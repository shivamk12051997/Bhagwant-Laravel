<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
  <div>
    <div class="logo-wrapper" style="height: auto; width:200px;"><a href="{{ url('/') }}"><img class="img-fluid for-light" src="{{ asset(env('APP_LOGO_DARK')) }}" alt=""><img class="img-fluid for-dark" src="{{ asset(env('APP_LOGO_LIGHT')) }}" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="{{ url('/') }}"><img class="img-fluid" width="50px" src="{{ asset(env('APP_FAVICON')) }}" alt=""></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn"><a href="{{ url('/') }}"><img class="img-fluid" src="{{ asset(env('APP_FAVICON')) }}" alt=""></a>
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>
          <li class="sidebar-main-title">
            <div>
              <h6>General</h6>
            </div>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
              <i data-feather="home"></i><span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('lot_no.index') }}">
              <i data-feather="home"></i><span>Lot No.</span>
            </a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('worker_salary.index') }}">
              <i data-feather="home"></i><span>Worker Salary</span>
            </a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('party_salary.index') }}">
              <i data-feather="home"></i><span>Party Salary</span>
            </a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('challan.index') }}?in_out=Out">
              <i data-feather="home"></i><span>Challan Out</span>
            </a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('material_challan.index') }}">
              <i data-feather="home"></i><span>Material Challan</span>
            </a>
          </li>
          <li class="sidebar-main-title">
            <div>
              <h6>Settings</h6>
            </div>
          </li>
          <li class="sidebar-main-title">
            <div>
              <h6>Master Fields</h6>
            </div>
          </li>
          
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title">
              <i data-feather="package"></i><span>Master Fields</span>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="{{ route('master.size.index') }}">Size</a></li>
              <li><a href="{{ route('master.color.index') }}">Color</a></li>
              <li><a href="{{ route('master.worker.index') }}">Worker Master</a></li>
              <li><a href="{{ route('master.master_lot.index') }}">Master Lot</a></li>
              <li><a href="{{ route('master.party.index') }}">Party </a></li>
              <li><a href="{{ route('master.material_item.index') }}">Material Item </a></li>
            </ul>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('website.setting') }}">
              <i data-feather="home"></i><span>Website Setting</span>
            </a>
          </li>
          {{-- <li class="sidebar-list">
            <a class="sidebar-link sidebar-title" href="#">
              <i data-feather="package"></i><span>Manage Employees</span>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="{{ route('employee.add') }}">Add Employee</a></li>
              <li><a href="{{ route('employee.index') }}">All Employees</a></li>
            </ul>
          </li> --}}
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>