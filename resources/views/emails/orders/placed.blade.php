@component('mail::message')
# Order Confirmation

Order **#{{ $order->id }}** received.  
**Total:** KES {{ number_format($order->total,2) }}

**Items**
@foreach($order->items as $item)
- {{ $item->food->name }} x {{ $item->quantity }} — KES {{ number_format($item->price,2) }}
@endforeach

Thanks,<br>{{ config('app.name') }}
@endcomponent
