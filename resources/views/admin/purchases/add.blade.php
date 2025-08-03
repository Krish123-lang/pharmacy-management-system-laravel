@extends('admin.app')

@section('title')
    Add Purchase
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Add purchases</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add purchase</h5>

                        <form action="{{ route('purchases.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Supplier Name<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" id="supplier_id" class="form-control" required>
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Invoice ID<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select name="invoice_id" id="invoice_id" class="form-control" required>
                                        <option value="">Select Invoice</option>
                                        @foreach ($invoices as $invoice)
                                            <option value="{{$invoice->id}}">{{$invoice->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Voucher Number<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="voucher_number" id="voucher_number" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Purchase Date<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="purchase_date" id="purchase_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Total Amount<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="total_amount" id="total_amount" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Payment Status<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select name="payment_status" id="payment_status" class="form-control" required>
                                        <option value="">Select Payment Status</option>
                                            <option value="1">Pending</option>
                                            <option value="2">Accepted</option>
                                            <option value="3">Cancelled</option>
                                    </select>
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
