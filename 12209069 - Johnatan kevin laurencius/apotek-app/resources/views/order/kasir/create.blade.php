@extends('layouts.template')

@section('content')
    <form action="{{ Route('kasir.order.store') }}" class="card p-4 mt-5" method="post">
        @csrf
        <p class="mb-3">Penanggung Jawab : <b>{{ Auth::user()->name }}</b></p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is-innvalid @enderror">Nama Pembeli :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_customer" name="name_customer" value="{{ old('name_customer') }}">
                @error('name_customer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="medicines" class="col-sm-2 col-form-label @error('medicines') is-innvalid @enderror">Obat :</label>
            <div class="col-sm-10">
                @error('medicines')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <select name="medicines[]" class="form-control">
                    <option disabled hidden selected>Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addselect()">+ tambah pesanan</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
    </form>
@endsection

@push('script')
    <script>
        let no = 2;
        function addselect() {
            let el = `<select name="medicines[]" class="form-control mt-3">
                    <option disabled hidden selected>Pesanan ${no}</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>`;
                $("#wrap-medicines").append(el);
                no++;
        };
    </script>
@endpush