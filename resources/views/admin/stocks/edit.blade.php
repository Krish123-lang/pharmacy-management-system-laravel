@extends('admin.app')

@section('title')
    Edit stock
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit stocks</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit stocks</h5>

                        <form action="{{ route('stocks.update', $stock->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Medicine Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <select name="medicine_id" id="medicine_id" class="form-control" required>
                                        <option value="">Select Medicine</option>
                                        @foreach ($medicine as $item)
                                            <option {{ ($item->id == $stock->id) ? 'selected' : '' }} value="{{$item->id}}">{{$item->medicine_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Batch ID<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="batch_id" id="batch_id" class="form-control" required value="{{ $stock->batch_id }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Expiry Date<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="expiry_date" id="expiry_date" class="form-control" required value="{{ $stock->expiry_date }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Quantity<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="quantity" id="quantity" class="form-control" required value="{{ $stock->quantity }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">MRP<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" name="mrp" id="mrp" class="form-control" required value="{{ $stock->mrp }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Rate<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" name="rate" id="rate" class="form-control" required value="{{ $stock->rate }}">
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
