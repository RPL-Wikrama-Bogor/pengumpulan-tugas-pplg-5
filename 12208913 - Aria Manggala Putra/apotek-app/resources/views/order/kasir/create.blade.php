@extends('layouts.template')

@section('content')
<form action="{{ route('kasir.order.store') }}" method="POST" class="card p-4 mt-5">
    @csrf
    <p class="mb-3">Penanggung Jawab: <b>{{ Auth::user()->name }}</b> </p>
<div class="mb-3 row">
    <label for="nama_customer" class="col-sm-2 col-form-label @error('nama_customer') is-invalid @enderror">Nama Pembeli:</label>
    <div class="col-sm-10">
        <input type="text"  class="form-control" id="nama_customer" name="nama_customer" value="{{ old('nama_customer') }}">
        @error('nama_customer')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="mb-3 row">
    <label for="medicines" class="col-sm-2 col-form-label @error('medicines') is invalid @enderror">Obat :</label>
    <div class="col-sm-10">
        @error('medicines')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <select name="medicines[]" class="form-control">
            @foreach($medicines as $item)
                <option value="{{ $item['id'] }}">{{ $item['name']}}</option>
            @endforeach
        </select>
        <div id="wrap-medicines"></div>
        <p class="text-primary mt-3" style="cursor: pointer" 
        onclick="addSelect()">+ tambah pesanan</p>
    </div>
</div>
    <button type="submit" class="btn btn-primary">Buat Pesanan</button>
</form>

@endsection

@push('script')
    <script>
        let no = 2;
        function addSelect(){
            //html yang akan ditambahkan ketika di click
            let el= ` <br> <select name="medicines[]" class="form-control">
            <option disabled hidden selected>Pesanan ${no}</option>
            @foreach($medicines as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>`;
        // dengan jquery, pada el dengan id wrap-medicines, ditambah html baru dari variable el dan disimpan di sebelum penutup tag wrap-medicines nya
        $("#wrap-medicines").append(el);
        // variable no di increment, agar berubah menjadi ditambah 1 tiap ada penambahan el html select tersebut
        no++;
        }
    </script>
@endpush

