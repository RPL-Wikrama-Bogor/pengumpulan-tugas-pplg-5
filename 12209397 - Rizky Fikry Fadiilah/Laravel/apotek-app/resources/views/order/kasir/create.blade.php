@extends('layouts.template')

@section('content')
    <form action="{{ route('kasir.order.store') }}" class="card p-4 mt-5" method="POST">
        @csrf
        <p class="mb-3">Penanggung Jawab : {{ Auth::user()->name }}</p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is-invalid @enderror">Nama
                Pembeli</label>
            <div class="col-sm-10">
                <input type="text" name="name_customer" id="name_customer" class="form-control">
                @error('name_customer')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="medicines" class="col-sm-2 col-form-label @error('medicines') is-invalid @enderror">Obat</label>
            <div class="col-sm-10">
                @error('medicines')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <select name="medicines[]" class="form-control" required>
                    <option disabled hidden selected>Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()">+ Tambah Pesanan</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Buat Pesanan</button>
    </form>
@endsection

@push('script')
    <script>
        let no = 2;

        function addSelect() {
            let el = `<select name="medicines[]" class="form-control mt-3" required>
                    <option disabled hidden selected>Pesanan</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>`;
            $('#wrap-medicines').append(el);
            no++;
        }
    </script>
@endpush
