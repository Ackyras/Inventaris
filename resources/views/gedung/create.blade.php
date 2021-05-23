@extends('master.dashboard')

@section('title-page')
Tambah Gedung
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Gedung</h6>
    </div>
    <form action="{{route('gedung.store')}}" method="POST">
    <div class="card-body">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="nama" class="form-label" id="nama">Nama gedung :</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="ex: A, B, C">
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
