@extends('layouts.template')

@section('content')
    <form action="{{ route('kasir.order.store') }}" method="POST" class="card p-4 mt-5">
        @csrf
        {{-- with gailed dari controller --}}
        @if (Session::get('failed'))
            <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
        @endif
        <p>Penangung Jawab : <b>{{ Auth::user()->name }}</b></p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label" @error('name_cusnomer') is-invalid @enderror>Nama
                Pembeli</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nama Pembeli" id="name_customer" name="name_customer"
                    value="{{ old('name_customer') }}">
                @error('name_customer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="medicines" class="col-sm-2 col-form-label" @error('medicines') is-invalid @enderror>Obat :</label>
            <div class="col-sm-10">
                @error('medicines')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                {{-- Name dengan {} agar semua value dari input/select yang namenya medicines bisa diambil semuanya, biasanya buat colummigration yang tipe datanya Json --}}
                <select name="medicines[]" class="form-control">
                    <option disable hidden selected> Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                {{-- div kosong buat nant disimpen html dari js --}}
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()"> + tambah pesanan</p>
            </div>
            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </div>
    </form>
@endsection

@push('script')
    <script>
        //nentuin pesanan ke berapa
        let no = 2;

        function addSelect() {
            let el = `<select name="medicines[]" class="form-control mt-3">
                    <option disable hidden selected> Pesanan ${no}</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>`;
            //dengan Jquery, pada el dengan id wrap-medicines, ditambah html baru dari variable el dan disimpan di sebelum penutup tag wrap-medicinesnya
            $("#wrap-medicines").append(el);  // append = menambahkan // html() = mengubah
            //Variable no di increments, agar berubah menjadi ditambah 1 tiap ada penambahan el html select tersebut
            no++;
        }
    </script>
@endpush
