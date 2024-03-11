@extends('layouts.app')

@section('title', 'Klinik Sehat')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
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
                                <h4>Edit Pengguna</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-icon"><i
                                            class="fa-solid fa-arrow-rotate-left"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.update', $user) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Nama</label>
                                                <input type="text"
                                                    class="form-control @error('name')
                                                        is-invalid
                                                    @enderror"
                                                    name="name" value="{{ $user->name }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>Email</label>
                                                <input type="email"
                                                    class="form-control @error('email')
                                                        is-invalid
                                                    @enderror"
                                                    name="email" value="{{ $user->email }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Hp.</label>
                                                <input type="text"
                                                    class="form-control @error('phone')
                                                    is-invalid
                                                @enderror"
                                                    name="phone" value="{{ $user->phone }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>Password</label>
                                                <input type="password"
                                                    class="form-control @error('password')
                                                    is-invalid
                                                @enderror"
                                                    name="password" >
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label">Status</div>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="role" value="admin"
                                                    class="selectgroup-input" @if ($user->role == 'admin') checked @endif>
                                                <span class="selectgroup-button">Admin</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="role" value="doctor"
                                                    class="selectgroup-input" @if ($user->role == 'doctor') checked @endif>
                                                <span class="selectgroup-button">Doctor</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="role" value="user"
                                                    class="selectgroup-input" @if ($user->role == 'user') checked @endif>
                                                <span class="selectgroup-button">User</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" id="toastr-2">Update</button>
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
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
