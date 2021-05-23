@extends('master.dashboard')

@section('title-page')
Edit Barang
@endsection

@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
@if (Session::has('posterr'))
<div class="alert alert-danger" role="alert">
    {{Session::get('posterr')}}
</div>
@endif
<form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-1 mx-auto form-admin">
        <label class="form-label">Kode Barang</label>
        <input type="text" name="kode" value="{{ $barang->kode }}" class="form-control @error('kode') is-invalid @enderror" autofocus required>
        @error('kode')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-1 mx-auto form-admin">
        <label class="form-label">Nama Barang</label>
        <input type="text" name="nama" value="{{ $barang->nama }}" class="form-control @error('nama') is-invalid @enderror" required>
        @error('nama')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-1 mx-auto form-admin">
        <label class="form-label">Merk Barang</label>
        <input type="text" name="merk" value="{{ $barang->merk }}" class="form-control @error('merk') is-invalid @enderror" required>
        @error('merk')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-1 mx-auto form-admin">
        <label class="form-label">Kategori Barang</label>
        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
            <option selected disabled value="" {{ old('kategori') == '' ? 'selected' : '' }}>Pilih Kategori Barang</option>
            <option value="Elektronik" {{ old('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
            <option value="Non Elektronik" {{ old('kategori') == 'Non Elektronik' ? 'selected' : '' }}>Non Elektronik</option>
        </select>
        @error('kategori')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="my-3 mx-auto form-admin position-relative pb-5">
        <button type="submit" class="btn btn-primary position-absolute top-0 end-0">Submit</button>
    </div>
</form>
@endsection
