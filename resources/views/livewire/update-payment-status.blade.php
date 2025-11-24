<div class="input-group">
    <select wire:model="status" class="form-select">
        <option value="pending">Pending</option>
        <option value="paid">Paid</option>
        <option value="failed">Failed</option>
    </select>
    <button class="btn btn-success" wire:click="updateStatus">Update</button>
</div>
@if(session()->has('message')) <div class="alert alert-success mt-2">{{ session('message') }}</div> @endif
