@extends('backend.layouts.app')

@push('body')
<script>
    $(document).ready(function () {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });

</script>
<script src="{{ asset('storage/assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
@endpush
@section('content')
@include('backend.layouts.alert')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h3> Pepatah</h3>
            <a href="{{ route('backend.pepatah.index') }}" class="btn btn-success">
                Kembali
            </a>

        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('backend.pepatah.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="pepatah_id" value="{{ $row->pepatah_id }}">
                        <div class="modal-body">
                            <label>Pepatah : </label>
                            <div class="form-group">
                                <input type="text" name="pepatah_petitih" id="pepatah_petitih" placeholder=""
                                    class="form-control"
                                    value="{{ old('pepatah_petitih') ?? $row->pepatah_petitih ?? '' }}">
                                @if ($errors->has('pepatah_petitih'))
                                <span class="text-danger">{{ $errors->first('pepatah_petitih') }}</span>
                                @endif
                            </div>
                            <label>Terjemah : </label>
                            <div class="form-group">
                                <input type="text" name="pepatah_terjemah" id="pepatah_terjemah" placeholder=""
                                    class="form-control"
                                    value="{{ old('pepatah_terjemah') ?? $row->pepatah_terjemah ?? '' }}">
                                @if ($errors->has('pepatah_terjemah'))
                                <span class="text-danger">{{ $errors->first('pepatah_terjemah') }}</span>
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
