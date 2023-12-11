@extends('layouts.template')

@section('content')
    <form action="{{ route('kasir.order.store')}}" method="POST" class="card p-4 mt-5">
        @csrf
        <p class="mb-3">Penanggung Jawab : <b>{{ Auth::user()->name }}</b></p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is-invalid @enderror">Nama
                Pembeli :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_customer" name="name_customer"
                    value="{{ old('name_customer') }}">
                @error('name_customer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="medicines" class="col-sm-2 col-form-label @error('medicines') is-invalid @enderror">Obat
                :</label>
            <div class="col-sm-10">
                @error('medicines')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                {{-- name dengan [] agar semua value dari input/select yg name nya medicines bisa diambil semuanya --}}
                <select name="medicines[]" class="form-control">
                    <option disabled hidden selected>Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                {{-- div kosong buat nanti disimpen html dari js --}}
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()">+ tambah pesanan</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
    </form>
    @endsection
    {{-- nentuin pesanan yg ke brp --}}
    @push('script')
    <script>
        let no = 2;
        // kalo ditaro didalam script jadinya di definisikan ulang
        function addSelect() {
            //html yg akan ditambahkan ketika diklik
            //$(no) manggil variable no
            let el = `<select name="medicines[]" class="form-control mt-3">
                <option disabled hidden selected>Pesanan ${no}</option>
                @foreach ($medicines as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
                </select>`;
                //dgn jquery, pada el dgn id wrap-medicines, ditambah html baru dari variable el & disimpan disebelum penurtup tag wrap-medicines nya (append)
                // $() -> js
                // # -> id
                $("#wrap-medicines").append(el);
                // .append -> menambah
                // .html -> mengubah
                // variabel no di increments, agar berubah menjadi ditambah 1 tiap ada penambahan el html select
                no++;
        }
    </script>

