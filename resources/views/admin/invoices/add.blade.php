@extends('admin.app')

@section('title')
    Add Invoice
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Add Invoices</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Invoice</h5>

                        <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Customer Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <select name="customer_id" id="customer_id" class="form-control" required>
                                        <option value="">Select customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Net Total<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="net_total" id="net_total" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Invoice Date<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="invoice_date" id="invoice_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Total Amount<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="total_amount" id="total_amount" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Total Discount<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="total_discount" id="total_discount" class="form-control" required>
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
