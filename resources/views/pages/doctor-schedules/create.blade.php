@extends('layouts.app')

@section('title', 'Klinik Sehat')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Jadwal Dokter</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('schedule.index') }}" class="btn btn-primary btn-icon"><i
                                            class="fa-solid fa-arrow-rotate-left"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('schedule.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="form-label">Dokter</label>
                                                <select
                                                    class="form-control select2 select2-hidden-accessible @error('doctor_id')
                                                    is-invalid
                                                @enderror"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true" name="doctor_id">
                                                    <option value="" selected disabled>-- Pilih Dokter --</option>
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}"
                                                            {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                            {{ $doctor->doctor_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('doctor_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-2">
                                                <label>Jadwal Senin</label>
                                                <input type="text" value="{{ old('senin') }}"
                                                    class="form-control"
                                                    name="senin">
                                            </div>
                                            <div class="col-2">
                                                <label>Jadwal Selasa</label>
                                                <input type="text" value="{{ old('selasa') }}"
                                                    class="form-control"
                                                    name="selasa">
                                            </div>
                                            <div class="col-2">
                                                <label>Jadwal Rabu</label>
                                                <input type="text" value="{{ old('rabu') }}"
                                                    class="form-control"
                                                    name="rabu">
                                            </div>
                                            <div class="col-2">
                                                <label>Jadwal Kamis</label>
                                                <input type="text" value="{{ old('kamis') }}"
                                                    class="form-control"
                                                    name="kamis">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-2">
                                                <label>Jadwal Jum'at</label>
                                                <input type="text" value="{{ old('jumat') }}"
                                                    class="form-control"
                                                    name="jumat">
                                            </div>
                                            <div class="col-2">
                                                <label>Jadwal Sabtu</label>
                                                <input type="text" value="{{ old('sabtu') }}"
                                                    class="form-control"
                                                    name="sabtu">
                                            </div>
                                            <div class="col-2">
                                                <label>Jadwal Ahad</label>
                                                <input type="text" value="{{ old('ahad') }}"
                                                    class="form-control"
                                                    name="ahad">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Status</label>
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="status" value="active"
                                                            class="selectgroup-input" checked="">
                                                        <span class="selectgroup-button">Active</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="status" value="inactive"
                                                            class="selectgroup-input" checked="">
                                                        <span class="selectgroup-button">Inactive</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <label>Catatan</label>
                                                <input type="text" value="{{ old('note') }}"
                                                    class="form-control @error('note')
                                                    is-invalid
                                                @enderror"
                                                    name="note">
                                                @error('note')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
    <script>
        document.getElementById("imageInput").addEventListener("change", function(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("imagePreview").src = e.target.result;
                document.getElementById("imagePreview").style.display = "block";
            }
            reader.readAsDataURL(file);
        });
    </script>
@endpush
