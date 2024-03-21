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
                                <h4>Edit Dokter</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('doctor.index') }}" class="btn btn-outline-primary btn-icon"><i
                                            class="fa-solid fa-arrow-rotate-left"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('doctor.update', $doctor) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Nama</label>
                                                <input type="text" value="{{ $doctor->doctor_name }}"
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
                                            <div class="col-4">
                                                <label>Email</label>
                                                <input type="email" value="{{ $doctor->doctor_email }}"
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
                                                <label>Hp</label>
                                                <input type="number" value="{{ $doctor->doctor_phone }}"
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Alamat</label>
                                                <input type="text" value="{{ $doctor->doctor_address }}"
                                                    class="form-control @error('address')
                                                    is-invalid
                                                    @enderror"
                                                    name="address">
                                                    @error('address')
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
                                                <label>SIP</label>
                                                <input type="text" value="{{ $doctor->sip }}"
                                                    class="form-control @error('sip')
                                                    is-invalid
                                                @enderror"
                                                    name="sip">
                                                @error('sip')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="">Spesialis</label>
                                                <input type="text" value="{{ $doctor->doctor_specialist }}"
                                                    class="form-control @error('specialist')
                                                    is-invalid
                                                    @enderror"
                                                    name="specialist">
                                                    @error('specialist')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="">ID Ihs</label>
                                                <input type="text" value="{{ $doctor->id_ihs }}"
                                                    class="form-control @error('ihs')
                                                    is-invalid
                                                    @enderror"
                                                    name="ihs">
                                                    @error('ihs')
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
                                            <label for="">NIK</label>
                                            <input type="text" value="{{ $doctor->nik }}"
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
                                                <label>Photo</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" name="image" id="imageInput"
                                                        accept="image/*">
                                                    <img id="imagePreview" src="#" alt="Doctor Image"
                                                        style="max-width: 200px; display: none;">
                                                    @if ($doctor->doctor_photo)
                                                        <div id="currentImageContainer">
                                                            <img src="{{ asset('/' . $doctor->doctor_photo) }}"
                                                                alt="Current Product Image" width="200px" class="img-thumbnail">
                                                            <button type="button" id="removeCurrentImage"
                                                                class="btn btn-sm btn-outline-danger">Remove</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-outline-primary">Simpan</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("imageInput").addEventListener("change", function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("imagePreview").src = e.target.result;
                    document.getElementById("imagePreview").style.display = "block";
                    document.getElementById("currentImageContainer").style.display = "none";
                }
                reader.readAsDataURL(file);
            });

            document.getElementById("removeCurrentImage").addEventListener("click", function() {
                document.getElementById("currentImageContainer").style.display = "none";
            });
        });
    </script>
@endpush
