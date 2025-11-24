@component('mail::message')
# New Order Received

Order **#{{ $order->id }}** by **{{ $order->user->name }}** ({{ $order->user->email }})

**Total:** KES {{ number_format($order->total,2) }}

**Items**
@foreach($order->items as $item)
- {{ $item->food->name }} x {{ $item->quantity }} — KES {{ number_format($item->price,2) }}
@endforeach

@component('mail::button', ['url'=>url('/vendor/dashboard')])
View Orders
@endcomponent

Thanks,<br>{{ config('app.name') }}
@endcomponent
