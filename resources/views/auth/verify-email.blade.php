@extends('auth.layouts.app')

@section('title')
    Verify Your Email Address
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Verify Your Email Address</h5>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <p class="mb-3">
                Before proceeding, please check your email for a verification link.<br>
                If you did not receive the email, you can request another below.
            </p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary w-100">Resend Verification Email</button>
            </form>
        </div>
    </div>
@endsection
