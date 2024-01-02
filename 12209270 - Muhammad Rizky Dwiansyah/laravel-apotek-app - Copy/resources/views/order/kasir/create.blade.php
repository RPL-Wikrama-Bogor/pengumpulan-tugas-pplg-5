@extends('layout.template')

@section('content')
<form action="{{ route('kasir.order.store')}}" class="card mt-3 p-5" method="POST">
    @if (Session::get('failed'))
    <div class="alert alert-danger">{{Session::get('failed')}}</div>
    @endif
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah)--}}

    @csrf


<div class="mb-3 row">
    <label for="nama_customer" class="col-sm-2 col-form-label @error('nama_customer') is-invalid @enderror">Email</label>
    <div class="col-sm-10">
        <input type="nama_customer" class="form-control" id="nama_customer" name="nama_customer">
        @error('nama_customer')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="mb-3 row">
    <label for="medicines" class="col-sm-2 col-form-label @error('medicines') is-invalid @enderror">Password</label>
    <div class="col-sm-10">
        <input type="medicines" class="form-control" id="medicines" name="medicines">
        @error('medicines')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<button type="submit" class="btn btn-primary">kirim data</button>
</form>
@endsection
<script>
//nentuin pesanan yang keberapa
let no = 2;
function addSelect()

  let el = `<select name="medicines[]" class="form-control mt - 3">
    <option disabled hidden selected>Pesanan ${no}</option>
    @foreach ($medicines as $item)
        <option value="{{ $item['id'] }}">{{$item['name'] }}</option>
        @endforeach
        </select>`;

        $("wrap-medicined").append(el);

        no++;
</script>

