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
                                <h4>Buat Pasien</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('patient.index') }}" class="btn btn-primary btn-icon"><i
                                            class="fa-solid fa-arrow-rotate-left"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('patient.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>NIK</label>
                                                <input type="number" value="{{ old('nik') }}"
                                                    class="form-control @error('nik')
                                                    is-invalid
                                                @enderror"
                                                    name="nik">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label>No KK</label>
                                                <input type="number" value="{{ old('kk') }}"
                                                    class="form-control @error('kk')
                                                    is-invalid
                                                @enderror"
                                                    name="kk">
                                                @error('kk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label>Nama</label>
                                                <input type="text" value="{{ old('name') }}"
                                                    class="form-control @error('name')
                                                    is-invalid
                                                @enderror"
                                                    name="name">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>HP</label>
                                                <input type="text" value="{{ old('phone') }}"
                                                    class="form-control @error('phone')
                                                    is-invalid
                                                @enderror"
                                                    name="phone">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label>Email</label>
                                                <input type="email" value="{{ old('email') }}"
                                                    class="form-control @error('email')
                                                    is-invalid
                                                @enderror"
                                                    name="email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-label">Gender</div>
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="gender" value="laki-laki"
                                                            class="selectgroup-input" checked="">
                                                        <span class="selectgroup-button">Laki-Laki</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="gender" value="perempuan"
                                                            class="selectgroup-input" checked="">
                                                        <span class="selectgroup-button">Perempuan</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Tempat Lahir</label>
                                                <input type="text" value="{{ old('birth_place') }}"
                                                    class="form-control @error('birth_place')
                                                    is-invalid
                                                @enderror"
                                                    name="birth_place">
                                                @error('birth_place')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label>Tanggal Lahir</label>
                                                <input type="text" value="{{ old('birth_date') }}"
                                                    class="form-control datepicker"
                                                    name="birth_date">
                                            </div>
                                        </div>
                                    </div>
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
@endpush
