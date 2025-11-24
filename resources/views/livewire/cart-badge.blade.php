<button class="btn btn-outline-primary position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
    Cart
    @if($count > 0)
        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">{{ $count }}</span>
    @endif
</button>
