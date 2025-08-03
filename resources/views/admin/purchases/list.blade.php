@extends('admin.app')

@section('title')
    Purchases
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Purchases List</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                {{-- Message show --}}
                @include('includes.admin._messages')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('purchases.create') }}" class="btn btn-primary">Add New purchase</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Invoice ID</th>
                                    <th scope="col">Voucher Number</th>
                                    <th scope="col">Purchased Date</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $purchase->supplier->name }}</td>
                                        <td>{{ $purchase->invoice_id }}</td>
                                        <td>{{ $purchase->voucher_number }}</td>
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td>Rs.{{ $purchase->total_amount }}</td>
                                        <td>
                                            @if ($purchase->payment_status == 1) Pending
                                            @elseif ($purchase->payment_status == 2) Accepted
                                            @elseif ($purchase->payment_status == 2) Cancelled
                                            @endif
                                        </td>
                                        <td>{{ date('Y-m-d', strtotime($purchase->created_at)) }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('purchases.edit', $purchase->id) }}"><i class="bi bi-pencil-square btn btn-success"></i></a>

                                            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="post"
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
