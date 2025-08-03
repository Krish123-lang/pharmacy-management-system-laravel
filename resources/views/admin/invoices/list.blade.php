@extends('admin.app')

@section('title')
    Invoices
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Invoices List</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                {{-- Message show --}}
                @include('includes.admin._messages')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('invoices.create') }}" class="btn btn-primary">Add New Invoice</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Net Total</th>
                                    <th scope="col">Invoice Date</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Total Discount</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $invoice->customer_id }}</td>
                                        <td>{{ $invoice->customer->name }}</td>
                                        <td>{{ $invoice->net_total }}</td>
                                        <td>{{ $invoice->invoice_date }}</td>
                                        <td>{{ $invoice->total_amount }}</td>
                                        <td>{{ $invoice->total_discount }}</td>
                                        <td>{{ date('Y-m-d', strtotime($invoice->created_at)) }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('invoices.edit', $invoice->id) }}"><i
                                                    class="bi bi-pencil-square btn btn-success"></i></a>

                                            <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post"
                                                onsubmit="return confirm('Are you sure?')" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')

                                                <button type="submit" class="btn btn-danger btn" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
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
