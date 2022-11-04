@extends('backend.layouts.app')
@push('head')

@endpush
@push('body')
<script src="{{ asset('storage/assets/js/pages/horizontal-layout.js') }}"></script>
<script src="{{ asset('storage/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/pages/dashboard.js') }}"></script>
@endpush
@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>Selamat Datang Sistem Informasi Dokumentasi Minangkabau</h2>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
