@extends('layouts.template')

@section('content')
    <form action="{{ route('kasir.order.store')}}" method="POST" class="card p-4 mt-5">
        @csrf
    {{-- with failed dari controller --}}
    @if (Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif
    <p>Penanggung Jawab : {{ Auth::user()->name }}</p>
    <div class="mb-3 row">
        <label for="nama_customer" class="col sm-2 col-form-label @error('nama_customer') is-invalid @enderror">Nama pembeli</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ old('nama_customer') }}">
            @error('nama_customer')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="medicines" class="col sm-2 col-form-label  @error('medicines') is-invalid @enderror">Obat</label>
        <div class="col-sm-10">
            @error('medicines')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <select name="medicines[]" class="form-control">
                <option disabled hidden selected>Pesanan 1</option>
                @foreach($medicines as $item)
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
    let no =2;
    function addSelect(){
        let el =`<select name="medicines[]" class="form-control mt-3">
            <option disabled hidden selected>pesanan ${no}</option>
            @foreach ($medicines as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }} </option>
            @endforeach
            </select>`;
            $('#wrap-medicines').append(el);
            no++;
             }
    </script>

    @endpush