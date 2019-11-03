@component('mail::message')
#Verify your e-mail

A detailed analysis of your page is *just seconds away!*

All you need to do now is validate your e-mail by clicking the link below

@component('mail::button', ['url' => $url])
Verify
@endcomponent

If you didn't request this, please ignore.

Thanks,
{{ config('app.name') }}
@endcomponent