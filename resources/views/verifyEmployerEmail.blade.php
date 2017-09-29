@component('mail::message')
# Welcome to Jobs4Mobs.com

Thank you for registering your account on our website. Please use this link to <b>Activate</b> your account.
<br>

<p style="text-align: center;" >
	<a href="{{ route('sendEmailDone.employer',["email" => $user->email, "verifyToken" => $user->verifyToken]) }}">Activate Account</a>
</p>

<br><br>

Thanks,<br>
Admin
@endcomponent
