@component('mail::message')
# New Offer
# 20% flat discount


It applies on all product,click the button to see the all product.

@component('mail::button', ['url' =>'https://www.banglashoppers.com/', 'color' => 'success'])
click
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
