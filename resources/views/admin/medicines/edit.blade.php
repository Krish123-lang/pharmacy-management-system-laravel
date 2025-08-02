@extends('admin.app')

@section('title')
    Edit Medicine
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit Medicine</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Medicine</h5>

                        <form action="{{ route('medicines.update', $medicine->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Medicine Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="medicine_name" id="medicine_name" class="form-control" required value="{{ $medicine->medicine_name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Packing<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="packing" id="packing" class="form-control" required value="{{ $medicine->packing }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Generic Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="generic_name" id="generic_name" class="form-control" required value="{{ $medicine->generic_name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Supplier Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" name="supplier_name" id="supplier_name" class="form-control" required value="{{ $medicine->supplier_name }}">
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
