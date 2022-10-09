@extends('backend.layouts.app')

@push('head')
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
    }

</script>
<script src="{{ asset('storage/assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

@endpush
@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Perhelatan</h3>
            <a href="{{ route('backend.perhelatan.index') }}" class="btn btn-success">
                Kembali
            </a>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('backend.perhelatan.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label>Nama : </label>
                            <div class="form-group">
                                <input type="text" name="perhelatan_nama" id="perhelatan_nama" placeholder=""
                                    class="form-control" value="{{ old('perhelatan_nama') }}">
                                @if ($errors->has('perhelatan_nama'))
                                <span class="text-danger">{{ $errors->first('perhelatan_nama') }}</span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label>Latitude : </label>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="perhelatan_lat" id="perhelatan_lat"
                                                class="form-control">
                                        </div>
                                        @if ($errors->has('perhelatan_lat'))
                                        <span class="text-danger">{{ $errors->first('perhelatan_lat') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Longtitude : </label>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="perhelatan_long" id="perhelatan_long"
                                                class="form-control">
                                        </div>
                                        @if ($errors->has('perhelatan_long'))
                                        <span class="text-danger">{{ $errors->first('perhelatan_long') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Gambar : </label>
                                    <div class="form-group">
                                        <input type="file" name="perhelatan_img" id="perhelatan_img" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <label>Keterangan : </label>
                            <div class="form-group">
                                <textarea name="perhelatan_ket" id="editor">{{ old('perhelatan_ket') }}</textarea>
                                @if ($errors->has('perhelatan_ket'))
                                <span class="text-danger">{{ $errors->first('perhelatan_ket') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="simpan" class="btn btn-primary ml-1" data-bs-dismiss="modal">
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
