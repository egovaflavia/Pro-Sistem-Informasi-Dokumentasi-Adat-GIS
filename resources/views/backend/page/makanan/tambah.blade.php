@extends('backend.layouts.app')
@push('head')
<link rel="stylesheet" href="{{ asset('storage/assets/extensions/sweetalert2/sweetalert2.min.css') }}">
@endpush
@push('body')
<script src="{{ asset('storage/assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
{{-- <script src="{{ asset('storage/assets/js/pages/summernote.js') }}"></script> --}}
<script>
    $(document).ready(function () {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });

</script>
@endpush
@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h3> {{ ucfirst(collect(request()->segments())->last()) }}</h3>
            <a href="{{ route('backend.berita.index') }}" class="btn btn-success">
                Kembali
            </a>

        </div>
        <div class="card-body">
            <form action="{{ route('backend.berita.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Judul Berita: </label>
                    <div class="form-group">
                        <input type="text" name="berita_judul" id="berita_judul" placeholder="Judul Berita"
                            class="form-control" value="{{ old('berita_judul') }}">
                        @if ($errors->has('berita_judul'))
                        <span class="text-danger">{{ $errors->first('berita_judul') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Status : </label>
                            <div class="form-group">
                                <select name="berita_status" id="berita_status" class="form-control">
                                    <option value="D">Draft</option>
                                    <option value="Y">Published</option>
                                    <option value="N">Non Published</option>
                                </select>
                                @if ($errors->has('berita_status'))
                                <span class="text-danger">{{ $errors->first('berita_status') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Gambar : </label>
                            <div class="form-group">
                                <input type="file" name="berita_img" id="berita_img" class="form-control">
                            </div>
                        </div>
                    </div>
                    <label>Isi Berita : </label>
                    <div class="form-group">
                        <textarea name="berita_isi" id="editor">{{ old('berita_isi') }}</textarea>
                        @if ($errors->has('berita_isi'))
                        <span class="text-danger">{{ $errors->first('berita_isi') }}</span>
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
    </div>

</section>
@endsection