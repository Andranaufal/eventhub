@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Partner</h1>

        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 me-1"></i>
            Tambah Partner
        </a>
    </div>

    {{-- Card --}}
    <div class="card shadow mb-4 border-0">
        
        {{-- Card Header --}}
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Partner Kerjasama
            </h6>
        </div>

        {{-- Card Body --}}
        <div class="card-body">

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="dataTable" width="100%" cellspacing="0">

                    {{-- Table Head --}}
                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="60">No</th>
                            <th width="170">Logo</th>
                            <th>Nama Partner</th>
                            <th width="220">Aksi</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody>

                        @forelse($partners as $partner)
                        <tr>

                            {{-- Nomor --}}
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            {{-- Logo --}}
                            <td class="text-center">
                                <img 
                                    src="{{ $partner->logo_url }}" 
                                    alt="{{ $partner->name }}"
                                    class="img-fluid rounded border p-1 bg-white"
                                    style="max-height: 70px; object-fit: contain;"
                                >
                            </td>

                            {{-- Nama --}}
                            <td>
                                <strong>{{ $partner->name }}</strong>
                            </td>

                            {{-- Aksi --}}
                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    {{-- Button Edit --}}
                                    <a href="{{ route('admin.partners.edit', $partner->id) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    {{-- Button Hapus --}}
                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" 
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                        {{-- Jika Data Kosong --}}
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Data partner belum tersedia
                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection