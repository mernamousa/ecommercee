@component('mail::message')
# Introduction


{{$data['message']}}
<br>
{{$data['verify_code']}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
