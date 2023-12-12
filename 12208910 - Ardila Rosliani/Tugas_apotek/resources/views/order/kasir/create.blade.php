@extends('layouts.template')

@section('content')
    <form action="{{ route('kasir.order.store')}}" method="POST" class="card p-4 mt-5">
        @csrf
        <p class="mb-3">Penanggung Jawab : {{ Auth::user()->name }}</p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is-invalid @enderror">Nama
                Pembeli :</label>
            <div class="col-sm-10">
                <input type="name_customer" class="form-control" id="name_customer" name="name_customer"
                    value="{{ old('name_customer') }}">
                @error('name_customer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="medicines" class="col-sm-2 col-form-label @error('medicines') is-invalid @enderror">Obat :</label>
            <div class="col-sm-10">
                @error('medicines')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                {{-- name dengan[] agar semua value dr input/select yang namanya medicines bisa diambil semuanya, biasanya buat column migration yg tipe datanya json --}}
                <select name="medicines[]" class="form-control">
                    <option disabled selected hidden>Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                {{-- div kosong buat nanti disimpan html dari js --}}
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()">+ tambah pesanan</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
    </form>
@endsection

@push('script')
    <script>
        // {{-- nentuin pesanan yang ke berapa --}}
        let no = 2;
        function addSelect() {
            // html yang akan ditambahkan ketika di click
            // ${no} manggi variable no
            let el = `<select name="medicines[]" class="form-control" class="mt-3">
                    <option disabled selected hidden>Pesanan ${no}</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>`;
            // dengan jquery, pada el dengan id wrap-medicines, ditambah html baru dari variable el dan disimpan di sebelum penutup tag wrap-medicinesnya
            //.html()untuk mengubah = append() untuk menambahkan 
            $("#wrap-medicines").append(el);
            //
            no++;
        }
    </script>
@endpush
