
@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<h3>Tambah Kategori</h3>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name') }}"
        >
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea
            name="description"
            class="form-control"
        >{{ old('description') }}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select">
            <option value="Aktif" {{ old('status', 'Aktif') == 'Aktif' ? 'selected' : '' }}>
                Aktif
            </option>
            <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>
                Tidak Aktif
            </option>
        </select>

        @error('status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
</form>

@endsection
