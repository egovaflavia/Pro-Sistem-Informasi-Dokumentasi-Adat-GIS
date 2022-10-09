@extends('backend.layouts.app')
@push('head')
<link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
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

    $.ajax({
        type: "GET",
        url: "{{ route('backend.pepatah.gis') }}",
        success: function (response) {
            $.each(response, function (key, value) {
                L.marker([value.pepatah_lat, value.pepatah_long]).bindPopup(`<strong>${value.pepatah_nama}</strong> <br> <p>${value.pepatah_ket}</p>`).openPopup().addTo(mymap);
            });
        }
    });

</script>

<script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
@endpush

@section('content')
@include('backend.layouts.alert')
<section class="section">
    <div class="card">

        <div id="map"></div>

        <div class="card-header">
            <h3> Pepatah</h3>
            <a href="{{ route('backend.pepatah.create') }}" class="btn btn-success">
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Pemetaan</th>
                        <th>Keterangan</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $no => $row)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->pepatah_nama }}</td>
                        <td>
                            <img style="width: 40%" src="{{ asset('storage/pepatah/'.$row->pepatah_img) }}" alt="">
                        </td>
                        <td>{{ $row->pepatah_lat }} | {{ $row->pepatah_long }}</td>
                        <td>{{ $row->pepatah_ket }}</td>
                        <td>
                            <div class="buttons">
                                <a href="{{ route('backend.pepatah.edit',$row->pepatah_id ) }}"
                                    class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                <a href="{{ route('backend.pepatah.destroy',$row->pepatah_id ) }}"
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
