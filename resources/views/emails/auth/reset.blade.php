@component('mail::message')
# Introduction

Blood Bank Reset Paswword.

@component('mail::button', ['url' => 'http://ipda3.com'])
Reset
@endcomponent
<p>Ur Reset Password is : {{$code}}</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
