@extends('layouts.template')

@section('content')
    <form action="{{ route('kasir.order.store') }}" method="post" class="card p-4 mt-5">
    @csrf
    <p>Penanggung Jawab: <strong>{{ Auth::user()->name }}</strong></p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is invalid @enderror">Nama Pembeli: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_customer" name="name_customer" value="{{ old('name_customer') }}">  
                @error('name_customer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 row">
            <label for="medicines" class="col-sm-2 col-form-label mt-3 @error('medicines') is invalid @enderror">Obat: </label>
            <div class="col-sm-10">
                <select name="medicines[]" class="form-control mt-3">
                    <option disabled hidden selected>Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                @error('medicines')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()">+ Tambah Pesanan</p>
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
    </form>
@endsection

@push('script')
    <script>
        // {{-- nentui pesanan yang keberapa --}}
        let no = 2;
        function addSelect() {
            let el = `<select name="medicines[]" class="form-control mt-3">
                        <option disabled hidden selected>Pesanan ${no}</option>
                        @foreach($medicines as $item)
                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select>`;
            $("#wrap-medicines").append(el);
            no++;
        }
    </script>
@endpush