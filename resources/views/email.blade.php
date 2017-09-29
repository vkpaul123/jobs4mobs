@component('mail::message')
# Dear {{ $mailToName }},

{{ $mailBody }}

<br><br>

Thanks,<br>
Admin
@endcomponent
