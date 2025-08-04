  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'dashboard') @else collapsed @endif href="{{ route('dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'customers') @else collapsed @endif href="{{ route('customers') }}">
                  <i class="bi bi-person"></i>
                  <span>Customers</span>
              </a>
          </li><!-- End Customers Nav -->

          <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'medicines') @else collapsed @endif href="{{ route('medicines') }}">
                  <i class="bi bi-shop"></i>
                  <span>Medicines</span>
              </a>
          </li><!-- End Medicines Nav -->

          <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'stocks') @else collapsed @endif href="{{ route('stocks') }}">
                  <i class="bi bi-archive"></i>
                  <span>Stocks</span>
              </a>
          </li><!-- End Medicines Stocks Nav -->

          <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'suppliers') @else collapsed @endif href="{{ route('suppliers') }}">
                  <i class="bi bi-person"></i>
                  <span>Suppliers</span>
              </a>
          </li><!-- End Medicines Suppliers Nav -->

          <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'invoices') @else collapsed @endif href="{{ route('invoices') }}">
                  <i class="bi bi-journal-text"></i>
                  <span>Invoices</span>
              </a>
          </li><!-- End Invoices Nav -->

          <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'purchases') @else collapsed @endif href="{{ route('purchases') }}">
                  <i class="bi bi-currency-dollar"></i>
                  <span>Purchases</span>
              </a>
          </li><!-- End purchases Nav -->

          {{-- <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'account') @else collapsed @endif href="{{ route('account') }}">
                  <i class="bi bi-layout-text-window-reverse"></i>
                  <span>My Acccount</span>
              </a>
          </li> --}}
          <!-- End My Account Nav -->

          <li class="nav-item">
              <a class="nav-link" @if (Request::segment(2) == 'logout') @else collapsed @endif href="{{ route('logout') }}">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Logout</span>
              </a>
          </li><!-- End logout Nav -->

      </ul>

  </aside>
