@extends('layouts.app')

@section('title', 'Klinik Sehat')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Dokter</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('doctor.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> dokter</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari dokter"
                                                name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>HP</th>
                                            <th>Photo</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->doctor_name }}</td>
                                                <td>{{ $doctor->doctor_email }}</td>
                                                <td>{{ $doctor->doctor_phone }}</td>
                                                <td>
                                                    @if ($doctor->doctor_photo)
                                                        <img src="{{ asset('/' . $doctor->doctor_photo) }}" alt=""
                                                            width="100px" class="img-thumbnail">
                                                    @else
                                                        <span class="badge badge-danger">No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-left">
                                                        <a href="{{ route('doctor.edit', $doctor->id) }}"
                                                            class="btn btn-sm btn-outline-info btn-icon" title="Edit">
                                                            <i class="fa-solid fa-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST"
                                                            class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-outline-danger btn-icon confirm-delete"
                                                                onclick="return confirm('Yakin menghapus data?')" title="Hapus" id="toastr-2">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $doctors->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
