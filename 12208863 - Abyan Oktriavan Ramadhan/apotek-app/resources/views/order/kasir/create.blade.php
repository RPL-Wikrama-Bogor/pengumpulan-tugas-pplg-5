@extends('layouts.template')

@section('content')
    <form action="{{ route('kasir.order.store') }}" method="POST" class="card p-4 mt-5">
        @csrf
        <p class="mb-3">Penanggung jawab : {{ Auth::user()->name }}</p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is-innvalid @enderror">Nama Pembeli</label>
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
                {{-- nama dengan [] agar semia value dari input atau selecct yang mae nya medicines bisa di amnol semia, biasanya buat column migration yang ipe datanya json --}}
                <select name="medicines[]" id="" class="form-control">
                    <option value="" disabled hidden selected>Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}"> {{ $item['name'] }} </option>
                    @endforeach
                </select>
                {{-- div kosong buat nanti disimpen html dar js --}}
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()"> + tambah pesanan</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"> buat pesanan</button>
    </form>
@endsection

@push('script')
    <script>
        // nentuin pesanan no keberapa
        let no = 2;
        function addSelect(){
            // no memanggil variabel no
            let el = `<select name="medicines[]" id="" class="form-control my-2">
                    <option value="" disabled hidden selected>Pesanan ${no}</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}"> {{ $item['name'] }} </option>
                    @endforeach
                </select>`;
            // dengan jquery, pada el dengan id wrap medicines, di tamah html baru adri variable el dan di simpan di sebelum penutup tag wrap medicinesnya
            $("#wrap-medicines").append(el);
            //variable no icrements, agar berubah menjadi di tambah 1 tiap ada penambahan el html select tersebut no++
            no++;
        }
    </script>
@endpush
