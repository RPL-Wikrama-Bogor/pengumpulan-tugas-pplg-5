@extends('layouts.template')

@section('content')
    <form action="{{ route('kasir.order.store') }}" method="post" class="card p-4 mt-5">
        @csrf
        <p class="mb-3">Penanggung Jawab : {{ Auth::user()->name }}</p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is-invalid @enderror">Nama
                Pembeli :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name_customer" id="name_customer"
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
                <select name="medicines[]" class="form-control">
                    <option disabled selected hidden>Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                {{-- div kosong buat nanti disimpen html dar js --}}
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()"> + tambah pesanan</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Buat Pesanan</button>

    </form>
@endsection

@push('script')
    <script>
        // nentuin pesanan yang ke berapa
        let no = 2;

        function addSelect() {
            // html akan ditambahkan ketika di klik
            let el = `<select name="medicines[]" class="form-control my-2">
                    <option disabled selected hidden>Pesanan ${no}</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>`;

            // dengan jquery pada el dengan id wrap-medicines, ditambahkan html baru dari variable el dan disimpan di sebelum penutup tag wrap-medicines nya
            // .html => mengubah elemen / .append() => menambah element
            $("#wrap-medicines").append(el);

            // variable no di increments, agar berubah menjadi ditambah 1 setiap ada penambahan el html select tersebut
            no++;
        }
    </script>
@endpush
