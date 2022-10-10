@extends('backend.layouts.app')
@push('head')
<link rel="stylesheet" href="{{ asset('storage/assets/extensions/sweetalert2/sweetalert2.min.css') }}">
@endpush
@push('body')
<script>
    $(document).ready(function () {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });

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

    mymap.on('click', onMapClick);
    var popup = L.popup();
    // buat fungsi popup saat map diklik
    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("Koordinat " + e.latlng
                .toString()
            ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
            .openOn(mymap);

        $('#makanan_lat').val(e.latlng.lat);
        $('#makanan_long').val(e.latlng.lng);
    }

</script>
<script src="{{ asset('storage/assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
@endpush
@section('content')
@include('backend.layouts.alert')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Makanan</h3>
            <a href="{{ route('backend.berita.index') }}" class="btn btn-success">
                Kembali
            </a>

        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('backend.makanan.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="makanan_id" value="{{ $row->makanan_id }}">
                        <div class="modal-body">
                            <label>Nama Makanan: </label>
                            <div class="form-group">
                                <input type="text" name="makanan_nama" id="makanan_nama" placeholder="Judul Berita"
                                    class="form-control" value="{{ old('makanan_nama') ?? $row->makanan_nama }}">
                                @if ($errors->has('makanan_nama'))
                                <span class="text-danger">{{ $errors->first('makanan_nama') }}</span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label>Latitude : </label>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="makanan_lat" id="makanan_lat" class="form-control"
                                                value="{{ old('makanan_lat') ?? $row->makanan_lat }}">
                                        </div>
                                        @if ($errors->has('makanan_lat'))
                                        <span class="text-danger">{{ $errors->first('makanan_lat') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Longtitude : </label>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="makanan_long" id="makanan_long"
                                                class="form-control"
                                                value="{{ old('makanan_long') ?? $row->makanan_long }}">
                                        </div>
                                        @if ($errors->has('makanan_long'))
                                        <span class="text-danger">{{ $errors->first('makanan_long') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label>Gambar : </label>
                                <div class="form-group position-relative has-icon-right">
                                    <input type="file" name="makanan_img" id="makanan_img" class="form-control">
                                    <div class="form-control-icon">
                                        <img style="height: 30px;width: 30px"
                                            src="{{ asset('storage/makanan/'. $row->makanan_img) }}" alt="No img">
                                    </div>
                                </div>
                            </div>
                            <label>Keterangan : </label>
                            <div class="form-group">
                                <textarea name="makanan_ket"
                                    id="editor">{{ old('makanan_ket') ?? $row->makanan_ket }}</textarea>
                                @if ($errors->has('makanan_ket'))
                                <span class="text-danger">{{ $errors->first('makanan_ket') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="simpan" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Save</span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
