@extends('layouts.template')

@section('content')
    <form action="{{route('cashier.order.store')}}" method="post" class="card p-4 mt-5">
        @csrf
        <p>penganggung jawa :   <b>{{ Auth::user()->name }}</b> </p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label ">nama pembeli :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_customer" name="name_customer" value="{{ old('name') }}">
                @error('name_customer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="medicines" class="col-sm-2 col-form-label ">obat :</label>
            <div class="col-sm-10">
                @error('medicines')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <select name="medicines[]" class="form-control">
                    <option disabled hidden selected> pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                 
                </select>
                <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: " onclick="addSelect()">+ tambah pesanan</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">buat pesanan</button>
    </form>
@endsection
@push('script')
<script>
    //nentuin persnaan yang ke berapa
      let no = 2;
    function addSelect(){
      
        //html yang akan ditambahkan ketika di klik
        //${no} memanggil variable no
        let el = `<br><select name="medicines[]" class="form-control">
            <option disabled hidden selected> pesanan ${no}</option>
            @foreach ($medicines as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>`;
        //dengan jquery pada el dengan id wrap-medicines, ditambah html baru dari variable el dan disimpan di sebelum penutu tag wrap-medicine nya
            //.html() = mengubah , .append() = menambahh
        $("#wrap-medicines").append(el);

        no ++;
    }
    </script>
@endpush