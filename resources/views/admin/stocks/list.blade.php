@extends('admin.app')

@section('title')
    Stocks
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Stocks List</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                {{-- Message show --}}
                @include('includes.admin._messages')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('stocks.create') }}" class="btn btn-primary">Add New Stocks</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Medicine Name</th>
                                    <th scope="col">Batch ID</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">MRP</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $stock->medicine->medicine_name ?? '' }}</td>
                                        <td>{{ $stock->batch_id }}</td>
                                        <td>{{ $stock->expiry_date }}</td>
                                        <td>{{ $stock->quantity }}</td>
                                        <td>{{ $stock->mrp }}</td>
                                        <td>{{ $stock->rate }}</td>
                                        <td>{{ date('Y-m-d', strtotime($stock->created_at)) }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('stocks.edit', $stock->id) }}"><i class="bi bi-pencil-square btn btn-success"></i></a>

                                            <form action="{{ route('stocks.destroy', $stock->id) }}" method="post" onsubmit="return confirm('Are you sure?')" enctype="multipart/form-data">
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
