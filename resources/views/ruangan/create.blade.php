@extends('master.dashboard')

@section('title-page')
Tambah Ruangan
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Ruangan</h6>
    </div>
    <form action="{{route('ruangan.store')}}" method="POST">
    <div class="card-body">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="gedung" class="form-label">Gedung :</label>
            <select name="gedung" id="gedung" class="form-control">
                <option selected disabled value="" {{ old('lokasi') == '' ? 'selected' : '' }}>lokal</option>
                @foreach ($gedung as $item)
                <option value="{{$item->id}}" {{ old('lokasi') == $item->id ? 'selected' : '' }}>Gedung {{$item->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama" class="form-label" id="nama">Nama ruangan :</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="ex: 001, 101, 201">
            @error('nama')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </div>
    </form>
</div>
@endsection
