@extends('admin.app')

@section('title')
    Edit Invoice
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit Invoices</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Invoice</h5>

                        <form action="{{ route('invoices.update', $invoice->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Customer Name<span style="color: red;">*</span></label>

                                <div class="col-sm-10">
                                    <select name="customer_id" id="customer_id" class="form-control" required>
                                        <option value="">Select customer</option>
                                        @foreach ($customers as $customer)
                                            <option {{ ($customer->id == $invoice->customer_id) ? 'selected' : '' }} value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Net Total<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="net_total" id="net_total" class="form-control" required value="{{ ($invoice->net_total) ?? '' }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Invoice Date<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="invoice_date" id="invoice_date" class="form-control" required value="{{ ($invoice->invoice_date) ?? '' }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Total Amount<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="total_amount" id="total_amount" class="form-control" required value="{{ ($invoice->total_amount) ?? '' }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Total Discount<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="total_discount" id="total_discount" class="form-control" required value="{{ ($invoice->total_discount) ?? '' }}">
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
