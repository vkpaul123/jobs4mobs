@component('mail::message')
# Welcome to Jobs4Mobs.com

Thank you for registering your account on our website. Please use this link to <b>Activate</b> your account.
<br>

<p style="text-align: center;">
	<a href="{{ route('sendEmailDone.user',["email" => $user->email, "verifyToken" => $user->verifyToken]) }}">Activate Account</a>
</p>

<br>
You can use these credentials for Logging in as well: <br>
<b>Email:</b> {{ $user->email }} <br>
<b>Password:</b> {{ $pass }}

<br><br>

Thanks,<br>
Admin
@endcomponent
