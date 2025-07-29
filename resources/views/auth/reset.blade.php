@extends('auth.layouts.app')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="card mb-3">

        <div class="card-body">

            <div class="pt-4 pb-2">

                {{-- Message show --}}
                @include('includes.admin._messages')

                <h5 class="card-title text-center pb-0 fs-4">Reset your password</h5>
            </div>

            <form class="row g-3 needs-validation" novalidate method="post" action="{{ url('reset/'.$token) }}">
                @csrf

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <span style="color: red;">{{ $errors->first('password') }}</span>
                        <div class="invalid-feedback">Please enter your Password.</div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="yourConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="yourConfirmPassword" required>
                    <span style="color: red;">{{ $errors->first('confirm_password') }}</span>
                    <div class="invalid-feedback">Please enter your password!</div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Reset</button>
                </div>
            </form>

        </div>
    </div>
@endsection
