@extends('master.dashboard')

@section('title-page')
List Ruangan
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Daftar Gedung</h6>
    </div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('ruangan.search') }}" method="GET">
            <input name="input" class="my-2 form-control w-25 float-right mr-2" type="text" id="myInput" onkeyup="searchData()" placeholder="Cari nama barang atau lokasi">
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No. </th>
                        <th scope="col">Nama Gedung</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gedung as $items)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td scope="row">{{ $items->nama }}</td>
                        <td scope="row">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#data{{$items->id}}">Detail</button>
                            <a href="{{ route('gedung.edit', $items->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('gedung.destroy', $items->id) }}" class="btn btn-danger btn-sm">Delete</a>

                        </td>
                    </tr>
                    <div class="modal fade" id="data{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Gedung {{$items->nama}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    @forelse ($items->ruangan as $item)
                                    <div class="modal">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Data Barang</h6>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-bold nama-barang">{{ $item->ruangan }}</h5>
                                    <dl class="ml-3">
                                        <dt><small><b>Nama</b></small></dt>
                                        <dd>{{ $item->nama }}</dd>
                                        <dt><small><b>Update Terakhir</dt>
                                        <dd>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at)->format('d-m-Y H:i:s') }}</b></small></dt>
                                    </dl>
                                    <div class="modal-footer">
                                        <a href="{{ route('ruangan.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('ruangan.destroy', $items->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus ruangan ini?(Anda akan menghapus seluruh barang yang ada dari ruangan ini)?')" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                    @empty
                                    <h5 class="font-weight-bold nama-barang">Belum ada barang di ruangan ini terdaftar!</h5>
                                    @endforelse
                                </div>

                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="6">@if ($kunci == null) Tidak ada barang @else Tidak ada barang dengan kata kunci {{$kunci}} @endif</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $gedung->links() }}
        </div>
    </div>
</div>
@endsection
