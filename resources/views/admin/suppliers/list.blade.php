@extends('admin.app')

@section('title')
    Suppliers
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Suppliers List</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                {{-- Message show --}}
                @include('includes.admin._messages')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add New suppliers</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->number }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>{{ date('Y-m-d', strtotime($supplier->created_at)) }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('suppliers.edit', $supplier->id) }}"><i class="bi bi-pencil-square btn btn-success"></i></a>

                                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="post" onsubmit="return confirm('Are you sure?')" enctype="multipart/form-data">
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
