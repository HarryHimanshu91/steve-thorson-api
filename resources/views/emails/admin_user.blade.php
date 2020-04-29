@component('mail::message')

Dear <b>{{ $email }},</b><br><br>
Your new CAREFORAIDS admin account has been created and is ready to use.<br>
Please log into CAREFORAIDS with your credentials below:<br>
Email ID : <b>{{ $email }}</b> 
<br>
Password : <b>{{ $password }}</b><br>
To keep your account secure, please change your password after logging in.

Thank You,<br>
CAREFORAIDS

@endcomponent
