@extends('master.dashboard')

@section('title-page')
Tambah Gedung
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Gedung</h6>
    </div>
    <form action="{{route('gedung.update', $gedung->id)}}" method="POST">
    <div class="card-body">
        @csrf
        <div class="form-group">
            <label for="nama" class="form-label" id="nama">Nama :</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="ex: A, B, C" value="{{$gedung->nama}}">
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
