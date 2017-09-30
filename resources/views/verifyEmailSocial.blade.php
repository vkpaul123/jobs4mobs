@component('mail::message')
# Welcome to Jobs4Mobs.com

Thank you for registering your account on our website. Please use this link to <b>Activate</b> your account.
<br>

<p style="text-align: center;">
	<a href="{{ route('sendEmailDone.user',["email" => $user->email, "verifyToken" => $user->verifyToken]) }}">Activate Account</a>
</p>

<br>
OAuth Service Provider: <b>{{ ucfirst($oAuthConfig['oAuthService']) }}</b> <br>
After Activation, You can use these credentials for Logging in as well: <br>
<b>Email:</b> {{ $user->email }} <br>
<b>Password:</b> {{ $oAuthConfig['password'] }}

<br><br>

Thanks,<br>
Admin
@endcomponent
