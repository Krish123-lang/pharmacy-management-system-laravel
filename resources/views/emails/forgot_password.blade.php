@component('mail::message')
    Hi, {{ $user->name }}. Forgot your password?
    <p>Click the link below to reset your password!</p>

    @component('mail::button', ['url' => url('reset/' . $user->remember_token)])
        Reset your password
    @endcomponent

    Thanks!

    {{ config('app.name') }}
@endcomponent
