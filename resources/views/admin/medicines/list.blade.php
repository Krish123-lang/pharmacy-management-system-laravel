@extends('admin.app')

@section('title')
    Medicines
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Medicines List</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                {{-- Message show --}}
                @include('includes.admin._messages')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('medicines.create') }}" class="btn btn-primary">Add New medicines</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Medicine Name</th>
                                    <th scope="col">Packing</th>
                                    <th scope="col">Generic Name</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($medicines as $medicine)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $medicine->medicine_name }}</td>
                                        <td>{{ $medicine->packing }}</td>
                                        <td>{{ $medicine->generic_name }}</td>
                                        <td>{{ $medicine->supplier_name }}</td>
                                        <td>{{ date('Y-m-d', strtotime($medicine->created_at)) }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('medicines.edit', $medicine->id) }}"><i class="bi bi-pencil-square btn btn-success"></i></a>

                                            <form action="{{ route('medicines.destroy', $medicine->id) }}" method="post" onsubmit="return confirm('Are you sure?')" enctype="multipart/form-data">
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
