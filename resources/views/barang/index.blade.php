@extends('master.dashboard')

@section('title-page')
List Daftar Barang
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Daftar Barang</h6>
    </div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('barang.search') }}" method="GET">
            <input name="input" class="my-2 form-control w-25 float-right mr-2" type="text" id="myInput" onkeyup="searchData()" placeholder="Cari nama barang atau lokasi">
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $barang)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $barang->kode }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{$barang->stok}}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#data{{$barang->id}}">Detail</button>
                            <form action="{{ route('barang.delete', $barang->id) }}" method="GET">
                                @csrf
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus barang {{$barang->nama}}?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="data{{$barang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="font-weight-bold nama-barang">{{ $barang->nama }}</h5>
                                    <dl class="ml-3">
                                        <dt><small><b>Kode</b></small></dt>
                                        <dd>{{ $barang->kode }}</dd>
                                        <dt><small><b>Nama</b></small></dt>
                                        <dd>{{ $barang->nama }}</dd>
                                        <dt><small><b>Lokasi</b></small></dt>
                                        <dd>
                                            @foreach ($barang->ruangan as $item)
                                                <ul>
                                                    <li>
                                                        {{$item->gedung->nama}}-{{$item->nama}} ({{$item->pivot->stok}})
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </dd>
                                        <dt><small><b>Kategori</b></small></dt>
                                        <dd>{{$barang->kategori}} </dd>
                                        <dt><small><b>Update Terakhir</dt>
                                        <dd>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $barang->updated_at)->format('d-m-Y H:i:s') }}</b></small></dt>
                                    </dl>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus barang(Anda akan menghapus seluruh barang {{$barang->nama}} dari seluruh ruangan)?')" class="btn btn-danger">Hapus</button>
                                    </form>
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
            {{ $barangs->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.getElementById("kategori-dropdown").addEventListener("mouseover", kategoriOver);
    document.getElementById("kategori-dropdown").addEventListener("mouseout", kategoriOver);
    document.getElementById("kategori").addEventListener("mouseover", kategoriOver);
    document.getElementById("kategori").addEventListener("mouseout", kategoriOver);

    document.getElementById("lokasi-dropdown").addEventListener("mouseover", lokasiOver);
    document.getElementById("lokasi-dropdown").addEventListener("mouseout", lokasiOver);
    document.getElementById("lokasi").addEventListener("mouseover", lokasiOver);
    document.getElementById("lokasi").addEventListener("mouseout", lokasiOver);

    function kategoriOver() {
        document.getElementById("kategori").classList.toggle("show");
    }

    function lokasiOver() {
        document.getElementById("lokasi").classList.toggle("show");
    }
</script>
@endsection
