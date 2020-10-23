@component('mail::message')
# Introduction

Blood bank reset password
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

<p>yor reset code is : {{$code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
