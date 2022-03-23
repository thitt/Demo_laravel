@if (session('message'))
<div class="alert alert-success mt-4 d-flex align-items-center" role="alert">
    <i class="ti-info-alt me-4"></i>
    <p>
        {{ session('message') }}
        {{ session('key') }}
    </p>
</div>
@endif

@if (session('key'))
    {{ session('key') }}
@endif
