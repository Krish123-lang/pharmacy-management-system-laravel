@extends('admin.app')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit Profile</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('includes.admin._messages')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Profile</h5>

                        <form action="{{ route('update.account', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email Address<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Leave blank if you do not want to change the password.</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password">
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
