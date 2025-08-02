@extends('admin.app')

@section('title')
    Add Medicine
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Add Medicines</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Medicines</h5>

                        <form action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Medicine Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="medicine_name" id="medicine_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Packing<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="packing" id="packing" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Generic Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="generic_name" id="generic_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Supplier Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="supplier_name" id="supplier_name" class="form-control" required>
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
