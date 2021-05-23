@extends('master.dashboard')

@section('title-page')
Tambah Barang
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-1 mx-auto form-admin">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" autofocus required>
                @error('kode')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-1 mx-auto form-admin">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-1 mx-auto form-admin">
                <label class="form-label">Merk Barang</label>
                <input type="text" name="merk" value="{{ old('merk') }}" class="form-control @error('merk') is-invalid @enderror" required>
                @error('merk')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-1 mx-auto form-admin">
                <label class="form-label">Lokasi Barang</label>
                <select name="lokasi" class="form-select @error('lokasi') is-invalid @enderror form-control" required>
                    <option selected disabled value="" {{ old('lokasi') == '' ? 'selected' : '' }}>Pilih Lokasi Barang</option>
                    @forelse ($ruangan as $item)
                    <option value="{{$item->id}}" {{ old('lokasi') == $item->id ? 'selected' : '' }}>Gedung {{$item->gedung->nama}}-{{$item->nama}}</option>
                    @empty

                    @endforelse
                    {{-- <option value="TPB" {{ old('lokasi') == 'TPB' ? 'selected' : '' }}>TPB</option>
                    <option value="PRODI" {{ old('lokasi') == 'PRODI' ? 'selected' : '' }}>Prodi</option> --}}
                </select>
                @error('lokasi')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-1 mx-auto form-admin">
                <label class="form-label">Kategori Barang</label>
                <select name="kategori" class="form-control form-select @error('kategori') is-invalid @enderror" required>
                    <option selected disabled value="" {{ old('kategori') == '' ? 'selected' : '' }}>Pilih Kategori Barang</option>
                    <option value="Elektronik" {{ old('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                    <option value="Non Elektronik" {{ old('kategori') == 'Non Elektronik' ? 'selected' : '' }}>Non Elektronik</option>
                </select>
                @error('kategori')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-1 mx-auto form-admin">
                <label class="form-label">Stok Barang</label>
                <input type="number" name="stok" value="{{ old('stok') }}" class="form-control @error('stok') is-invalid @enderror" required>
                @error('stok')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-3 mx-auto form-admin position-relative pb-5">
                <button type="submit" class="btn btn-primary position-absolute top-0 end-0">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
