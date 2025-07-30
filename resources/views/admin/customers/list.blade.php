@extends('admin.app')

@section('title')
    Customers
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Customers List</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                {{-- Message show --}}
                @include('includes.admin._messages')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('add_customers') }}" class="btn btn-primary">Add New Customers</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Doctor Name</th>
                                    <th scope="col">Doctor Address</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->contact_numer }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->doctor_name }}</td>
                                        <td>{{ $customer->doctor_address }}</td>
                                        <td>{{ date('Y-m-d', strtotime($customer->created_at)) }}</td>
                                        <td>Action</td>
                                    </tr>
                                @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
