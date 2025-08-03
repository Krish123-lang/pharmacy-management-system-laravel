@extends('admin.app')

@section('title')
    Edit Supplier
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit Suppliers</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Suppliers</h5>

                        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Medicine Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <select name="medicine_id" id="medicine_id" class="form-control" required>
                                        <option value="">Select Medicine</option>
                                        @foreach ($medicine as $item)
                                            <option {{ ($item->id == $supplier->id) ? 'selected' : '' }} value="{{$item->id}}">{{$item->medicine_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Name<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" required value="{{ $supplier->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Email<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" class="form-control" required value="{{ $supplier->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Phone Number<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="tel" name="number" id="number" class="form-control" required value="{{ $supplier->number }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Address<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" id="address" class="form-control" required value="{{ $supplier->address }}">
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
