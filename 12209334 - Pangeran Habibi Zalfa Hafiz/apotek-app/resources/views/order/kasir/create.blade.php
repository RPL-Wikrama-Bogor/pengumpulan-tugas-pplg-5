@extends('layouts.template')
@section('content')

<form action="{{ route('cashier.order.store') }}" method="POST" class="card p-4 mt-5">
    @csrf
    <p class="mb-3">Penanggung Jawab: <b>{{ Auth::user()->name }}</b> </p>
    @if (Session::get('failed'))    
        <div class="alert alert-danger mt-3">{{Session::get('failed')}}</div>
    @endif
    <div class="mb-3 row">
        {{-- for id email isinya sama kaya name column di migrations --}}
        <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is-invalid @enderror">Nama pembeli:</label>
        <div class="col-sm-10">
            <input type="text"  class="form-control" id="name_customer" name="name_customer" value="{{ old('name_customer') }}">
            @error('name_customer')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        {{-- for id password isinya sama kaya name column di migrations --}}
        <label for="medicines" class="col-sm-2 col-form-label @error('medicines') is-invalid @enderror">Obat :</label>
        <div class="col-sm-10">
            @error('medicines')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <select name="medicines[]" class="form-control">
                <option disabled hidden selected >Pesanan 1 </option>
                @foreach ($medicines as $item)
                    <option value="{{ $item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
            <div id="wrap-medicines"></div>
            <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()">+ Tambah Pesanan</p>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Buat Pesanan</button>
</form>
@endsection

@push('script')
    <script>
        let no = 2;
        function addSelect(){
            let el = ` <select name="medicines[]" class="form-control">
            <option disabled hidden selected>Pesanan ${no}</option>
            @foreach($medicines as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>`;
        
        //denan jquerry, pada el dengan id wrap-medicines, di tambah html baru dari variable el dan di simppan di sebelum tag wrap medicines nya
            $("#wrap-medicines").append(el)
        //variable no di increments, agar berubah menjadi di tambah 1 pada penambahan el html select tersebut
        no++;
        }
    </script>
@endpush
