@extends('admin.app')

@section('title')
    Customers
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit Customers</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Customer</h5>

                        <form action="{{ route('update_customers', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" required value="{{ $customer->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Contact Number<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="number" name="contact_number" id="contact_number" class="form-control"  value="{{ $customer->contact_number }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Address</label>

                                <div class="col-sm-10">
                                    <input type="text" name="address" id="address" class="form-control" required value="{{ $customer->address }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Doctor Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="doctor_name" id="doctor_name" class="form-control" required  value="{{ $customer->doctor_name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Doctor Address</label>

                                <div class="col-sm-10">
                                    <input type="text" name="doctor_address" id="doctor_address" class="form-control" required value="{{ $customer->doctor_address }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
