@extends('backend.layouts.app')
@push('head')
<link rel="stylesheet"
    href="{{ asset('storage/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/css/pages/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/css/pages/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/extensions/summernote/summernote-lite.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/extensions/sweetalert2/sweetalert2.min.css') }}">
@endpush
@push('body')
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('storage/assets/js/pages/datatables.js') }}"></script>
<script src="{{ asset('storage/assets/extensions/summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/pages/summernote.js') }}"></script>
<script src="{{ asset('storage/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@section('content')
@include('backend.layouts.alert')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h3> Berita</h3>
            <a href="{{ route('backend.berita.create') }}" class="btn btn-success">
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm" id="table1">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="50%">Berita</th>
                        <th width="25%">Tgl Terbit</th>
                        <th width="20%">#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $no => $baris)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>
                            <p>
                                {{ $baris->berita_judul }} <br>
                                Editor : {{ $baris->user->name }} <br>
                                <span class="badge bg-success">{{ $baris->berita_status }}</span>
                            </p>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($baris->created_at)->format('d-M-Y H:i') }}</td>
                        <td>
                            <div class="buttons">
                                <a href="{{ route('backend.berita.edit',$baris->berita_id ) }}"
                                    class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                <a href="{{ route('backend.berita.destroy',$baris->berita_id ) }}"
                                    class="btn icon btn-danger"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">Data Tidak Ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
