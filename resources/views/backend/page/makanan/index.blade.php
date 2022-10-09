@extends('backend.layouts.app')
@push('head')
<link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/summernote/summernote-lite.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
<style>
    #map {
        height: 400px;
    }
</style>
@endpush
@push('body')
<script>
    var mymap = L.map('map').setView([-0.73994, 100.800005], 8);



    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 20,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2w5MTFqbGZtMGNqYzN1bncxMjAzM2JqaiJ9.p0tskDTd_HmXoNe2_CUthA'
        }).addTo(mymap);

    L.marker([-0.520985, 100.774841]).bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup().addTo(mymap);

    L.marker([-0.394646, 100.758362]).bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup().addTo(mymap);


    // L.popup()
    //     .setLatLng([-0.520985, 100.774841])
    //     .setContent("I am a standalone popup.")
    //     .openOn(mymap);

    // L.popup()
    //     .setLatLng([-0.394646, 100.758362])
    //     .setContent("I am a standalone popup.")
    //     .openOn(mymap);

    // buat variabel berisi fugnsi L.popup
    var popup = L.popup();

    // buat fungsi popup saat map diklik
    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("koordinatnya adalah " + e.latlng
                .toString()
                ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
            .openOn(mymap);
    }

    mymap.on('click', onMapClick);

</script>

<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
<script src="{{ asset('assets/extensions/summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/summernote.js') }}"></script>
<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@section('content')
@include('backend.layouts.alert')
<section class="section">
    <div class="card">

        <div id="map"></div>

        <div class="card-header">
            <h3> Makanan</h3>
            <a href="{{ route('backend.makanan.create') }}" class="btn btn-success">
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
                                <a href="{{ route('backend.makanan.edit',$baris->berita_id ) }}"
                                    class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                <a href="{{ route('backend.makanan.destroy',$baris->berita_id ) }}"
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
