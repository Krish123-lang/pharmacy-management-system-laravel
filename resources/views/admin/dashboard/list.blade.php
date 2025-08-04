@extends('admin.app')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">dashboard</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Customers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('customers') }}">
                            <h6>{{ $total_customers }}</h6>
                        </a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Customers Card -->

            <!-- Medicine Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Medicines</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-shop"></i>
                    </div>
                    <div class="ps-3">
                     <a href="{{ route('medicines') }}">
                        <h6>{{ $total_medicines }}</h6>
                    </a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Medicine Card -->

            <!-- Stocks Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Stocks</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-archive"></i>
                    </div>
                    <div class="ps-3">
                     <a href="{{ route('stocks') }}">
                        <h6>{{ $total_stocks }}</h6>
                    </a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Stocks Card -->

            <!-- Suppliers Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card suppliers-card">

                <div class="card-body">
                  <h5 class="card-title">Suppliers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                     <a href="{{ route('suppliers') }}">
                        <h6>{{ $total_suppliers }}</h6>
                    </a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Suppliers Card -->

            <!-- Invoices Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card invoices-card">

                <div class="card-body">
                  <h5 class="card-title">Invoices</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                     <a href="{{ route('invoices') }}">
                        <h6>{{ $total_invoices }}</h6>
                    </a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Invoices Card -->

            <!-- Purchases Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card purchases-card">

                <div class="card-body">
                  <h5 class="card-title">Total Purchased Amount</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                     <a href="{{ route('purchases') }}">
                        <h6>$ {{ ($total_purchase_amount) }}</h6>
                    </a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Purchases Card -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>


  <!-- End #main -->

@endsection
