@extends('layouts.template')

@section('content')
<form action="{{ route('kasir.order.store') }}" method="POST" class="card p-4 mt-5">
    @csrf
    <p class="mb-3 ">Penanggung Jawab : <b>{{ Auth::user()->name }}</b></p>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label @error('name_customer') is-invalid @enderror">Nama Pembeli : </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name_customer" name="name_customer" value="{{ old('name_customer')}}">
        @error('name_customer')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="medicines" class="col-sm-2 col-form-label @error('medicines') is-invalid @enderror">Obat : </label>
        <div class="col-sm-10">
            @error('medicines')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            {{-- name dengan [] agar semua value dr input select yang name nya medicines bida diambil semuanya --}}
            <select name="medicines[]" class="form-control">
                <option disable hidden seected>Pesanan 1</option>
                @foreach ($medicines as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
            {{-- div kosong baut nanti disempen html dari js --}}
            <div id="wrap-medicines"></div>
            <p class="tect-primary mt-3" style="cursor: pointer" onclick="addSellect()">+ tambah pesanan</p>
        </div>
    </div>
    <button type="submit" class= "btn btn-primary">Buat Pesanan</button>
</form>
@endsection

@push('script')
    <script>
        // nentuim pesanan yang  ke ebrapa
        let no = 2;
        function addSellect(){
            // htmel yang akan di tambahkan ketika di klik
            // ${no}, manggil variable no
            let el = `<select name="medicines[]" class="form-control my-2">
                <option disable hidden seected>Pesanan ${no}</option>
                @foreach ($medicines as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>`
            // dengan jquery, pada el dengan id wrap-medicines, ditambah html baru
            // dari variable el dan disimpan di sebelum penutup tag wrap-medicinesnya
            // .html = mengubah , .append = menambahkan
            $("#wrap-medicines").append(el);
            // variable no di increments, agar berubah menjadi ditambah 1 tiap ada penambahan el html select tersebut
            no++;
        }
    </script>
@endpush