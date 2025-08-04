@extends('admin.app')

@section('title')
    Website Logo
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Website Logo</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('includes.admin._messages')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Website Logo</h5>

                        <form action="{{ route('website_logo_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Website Name<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="website_name" id="website_name" class="form-control" required value="{{ old('website_name', $logo->website_name) }}">
                                    @error('website_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="logo" class="col-sm-2 col-form-label">Website Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="logo" id="logo" class="form-control">

                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if($logo->logo)
                                    <img src="{{ asset('storage/' . $logo->logo) }}" class="img-thumbnail mt-2" style="width: 250px; height: 250px;" alt="{{ $logo->website_name }}">
                                @endif
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
