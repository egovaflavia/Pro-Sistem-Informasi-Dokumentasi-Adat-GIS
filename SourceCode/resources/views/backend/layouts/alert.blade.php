@if (session('success'))
<div class="alert alert-success alert-dismissible show fade">
    {{ ucfirst(session('success')) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger alert-dismissible show fade">
    {{ ucfirst(session('danger')) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('warning'))
<div class="alert alert-warning alert-dismissible show fade">
    {{ ucfirst(session('warning')) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('info'))
<div class="alert alert-info alert-dismissible show fade">
    {{ ucfirst(session('info')) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif