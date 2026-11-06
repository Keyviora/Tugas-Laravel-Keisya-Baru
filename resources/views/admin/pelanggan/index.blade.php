@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Daftar Pelanggan
            </li>
        </ol>
    </nav>

    <!-- Judul Halaman -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Daftar Pelanggan</h1>
            <p class="mb-0">Kelola informasi dan data pelanggan.</p>
        </div>

        <div>
            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
                + Tambah Pelanggan
            </a>
        </div>
    </div>

    <!-- Notifikasi Berhasil -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Notifikasi Validasi -->
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Card Tabel Pelanggan -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                        <h5 class="fw-bold mb-0">Data Pelanggan</h5>
                        <span class="text-secondary">
                            Total: {{ $pelanggan->count() }} pelanggan
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($pelanggan as $item)
                                    <tr>
                                        <td>{{ $item->pelanggan_id }}</td>
                                        <td class="fw-bold">
                                            {{ $item->first_name }} {{ $item->last_name }}
                                        </td>
                                        <td>{{ $item->birthday ?: '-' }}</td>
                                        <td>{{ $item->gender ?: '-' }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone ?: '-' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                                <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data pelanggan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <h5 class="fw-bold">Belum Ada Data Pelanggan</h5>
                                            <p class="text-gray-500 mb-3">Tambahkan data pelanggan untuk mulai mengelola informasi.</p>
                                            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">+ Tambah Pelanggan</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection