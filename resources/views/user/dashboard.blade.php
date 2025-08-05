@extends('admin.app')

@section('title')
    User Dashboard
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Welcome, {{ Auth::user()->name }}!</h2>
        <div class="row mt-4">
            <!-- Profile Summary -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Profile Summary</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Role:</strong> @if (Auth::user()->is_role === "USR") User @endif</p>
                        <a href="{{ route('user.account') }}" class="btn btn-sm btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
            <!-- Quick Links -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        {{-- href="{{ route('orders.index') }}" --}}
                        <a  class="btn btn-outline-success w-100">
                            <i class="bi bi-bag"></i> My Orders
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        {{-- href="{{ route('support') }}" --}}
                        <a  class="btn btn-outline-info w-100">
                            <i class="bi bi-question-circle"></i> Support
                        </a>
                    </div>
                </div>
                <!-- Notifications -->
                <div class="card mt-3">
                    <div class="card-header">Notifications</div>
                    <div class="card-body">
                        <p>No new notifications.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Activity -->
        <div class="card mt-4">
            <div class="card-header">Recent Activity</div>
            <div class="card-body">
                <ul>
                    <li>Logged in at {{ Auth::user()->created_at ?? 'N/A' }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
