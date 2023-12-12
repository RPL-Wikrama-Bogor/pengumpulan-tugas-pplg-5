@extends('layouts.template')

@section('content')
    <div class="cotainer mt-3">
        <form action="{{ route('kasir.order.store') }}" class="card mt-5 p-4" method="post">
            @csrf 
            @if (Session::get('failed'))
                <div class="alert alert-danger">{{ Session::get('failed') }}</div>
            @endif
            <p>Penanggung Jawab : <b>{{ Auth::user()->name }}</b></p>
            <div class="mb-3 row">
                <label for="name_customer" class="col-sm-2 col-form-label">Nama Pembeli</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name_customer" name="name_customer"
                        value="{{ old('name_customer') }}">
                    @error('name_customer')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="medicines" class="col-sm-2 col-form-label">Obat</label>
                <div class="col-sm-10">
                    <select name="medicines[]" id="medicines" class="form-select">
                        <option selected hidden disabled>Pesanan 1</option>
                        @foreach ($medicines as $item)
                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select>
                    @error('medicines')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="wrap-medicines"></div>
                    <br>
                    <p style="cursor: pointer" class="text-primary mt-3" id="add-select">+ tambah pesanan</p>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-lg btn-primary">Konfirmasi Pembelian</button>
        </form>
    </div>
@endsection

@push('script')
    <script>
        let no = 2;

        $("#add-select").on("click", function() {
            let el = `<b><select name="medicines[]" id="medicines" class="form-select mt-3">
                <option selected hidden disabled>Pesanan ${no}</option>
                @foreach ($medicines as $item)
                 <option value="{{ $item['id'] }}">{{ $item['name'] }}</option> 
                @endforeach
                </select></b>`;
            $(".wrap-medicines").append(el);
            no++;
        });
    </script>
@endpush