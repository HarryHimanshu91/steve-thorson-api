@component('mail::message')
# Hi {{ $email }},

Please click on below button to reset your password.

@component('mail::button', ['url' => ''])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
