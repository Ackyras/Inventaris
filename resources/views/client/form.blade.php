@extends('master.master')

@section('title', 'Form Pinjam Barang')

@section('css')
<link rel="stylesheet" href="{{ asset('css/formbarang.css')}}">
@endsection

@section('content')
<div class="row sticky-top bg-light pb-3">
    <h4 class="p-2 title-header">Formulir Peminjaman Barang</h4>
    <div class="line"></div>
</div>
<div class="row">
    <h4 class="title-data">Data Peminjam</h4>
    <div class="line-2"></div>
</div>
<div class="row pb-4">
    @if (session('status'))
    <div class="alert alert-success mt-3 w-50">
        {{ session('status') }}
    </div>
    @endif
    <form class="col-8" action="{{ route('client.store') }}" method="POST">
        @csrf
        <div class="form-group p-1">
            <label>Nama Depan*</label>
            <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam') }}" class="form-control rounded @error('nama_peminjam') is-invalid @enderror" required placeholder="Masukkan nama anda" autofocus>
            @error('nama_depan')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group p-1">
            <label>No. Pengenal(NIM/KTP)*</label>
            <input type="text" name="no_id" value="{{ old('no_id') }}" class="form-control rounded @error('nim') is-invalid @enderror" required placeholder="Masukan NIM/KTP anda">
            @error('nim')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <h4 class="title-keterangan">Keterangan Peminjam</h4>
        <div class="line-3"></div>
        <div class="row pb-5">
            <label>Pilih barang*</label>
            <div class="col-9">
                <input list="barangs" name="kode1" class="form-control @error('kode1') is-invalid @enderror" required placeholder="Pilih barang 1*">
                <datalist id="barangs">
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->nama }}"><small>{{ $barang->stok }} unit</small> </option>
                    @endforeach
                </datalist>
                @error('kode1')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <input type="number" name="jumlah1" min="1" max="5" value="1" class="form-control @error('jumlah1') is-invalid @enderror" required>
                @error('jumlah1')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label class="mt-3">Pilih barang (<small>opsional</small>)</label>
            <div class="col-9">
                <input list="barangs" name="kode2" class="form-control @error('kode2') is-invalid @enderror" placeholder="Pilih barang 2 (opsional)">
                <datalist id="barangs">
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->nama_barang }}"><small>{{ $barang->peminjaman }} unit</small> </option>
                    @endforeach
                </datalist>
                @error('kode2')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <input type="number" name="jumlah2" min="0" max="5" value="" class="form-control @error('jumlah2') is-invalid @enderror">
                @error('jumlah2')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label class="mt-3">Pilih barang (<small>opsional</small>)</label>
            <div class="col-9">
                <input list="barangs" name="kode3" class="form-control @error('kode3') is-invalid @enderror" placeholder="Pilih barang 3 (opsional)">
                <datalist id="barangs">
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->nama_barang }}"><small>{{ $barang->peminjaman }} unit</small> </option>
                    @endforeach
                </datalist>
                @error('kode3')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <input type="number" name="jumlah3" min="0" max="5" value="" class="form-control @error('jumlah3') is-invalid @enderror">
                @error('jumlah3')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label class="mt-3">Pilih barang (<small>opsional</small>)</label>
            <div class="col-9">
                <input list="barangs" name="kode4" class="form-control @error('kode4') is-invalid @enderror" placeholder="Pilih barang 4 (opsional)">
                <datalist id="barangs">
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->nama_barang }}"><small>{{ $barang->peminjaman }} unit</small> </option>
                    @endforeach
                </datalist>
                @error('kode4')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <input type="number" name="jumlah4" min="0" max="5" value="" class="form-control @error('jumlah4') is-invalid @enderror">
                @error('jumlah4')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label class="mt-3">Pilih barang (<small>opsional</small>)</label>
            <div class="col-9">
                <input list="barangs" name="kode5" class="form-control @error('kode5') is-invalid @enderror" placeholder="Pilih barang 5 (opsional)">
                <datalist id="barangs">
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->nama_barang }}"><small>{{ $barang->peminjaman }} unit</small> </option>
                    @endforeach
                </datalist>
                @error('kode5')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <input type="number" name="jumlah5" min="0" max="5" value="" class="form-control @error('jumlah5') is-invalid @enderror">
                @error('jumlah5')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Peminjaman*</label>
                <input type="date" name="tanggal_peminjaman" class="form-control rounded @error('tanggal_peminjaman') is-invalid @enderror" value="{{ Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d') }}" required placeholder="Pilih tanggal peminjaman">
                @error('tanggal_peminjaman')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Pengembalian*</label>
                <input type="date" name="tanggal_pengembalian" class="form-control rounded @error('tanggal_pengembalian') is-invalid @enderror" value="{{ Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->addDay()->format('Y-m-d') }}" required placeholder="Pilih tanggal pengembalian">
                @error('tanggal_pengembalian')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Pinjam</button>
    </form>
</div>
@endsection
