<div style="margin-top:10px;">
    <strong>Order Status:</strong>

    <select wire:model="status">
        <option value="pending">Pending</option>
        <option value="processing">Processing</option>
        <option value="completed">Completed</option>
        <option value="cancelled">Cancelled</option>
    </select>

    <button wire:click="updateStatus">Save</button>

    @if(session()->has('message'))
        <p style="color:blue">{{ session('message') }}</p>
    @endif
</div>
