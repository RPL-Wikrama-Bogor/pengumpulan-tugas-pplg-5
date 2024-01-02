@extends('layouts.template')

@section('content')
  <form action="{{route('kasir.order.store')}}" method="POST" class="card p-4 mt-5">
    @csrf 
    <p>penanggung jawab : <b>{{Auth::user()->name}}</b></p>
    {{-- with failed dari controller --}}
    @if ( Session::get('failed'))
        <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
        @endif
    <div class="mb-3 row">
        <label for="name_customer" class="col-sm-2 col-form-label  @error('name_customer') is-invalid @enderror">Nama pembeli</label>
        <div class="col-sm-10">
            <input type="text"  class="form-control" id="name_customer" name="name_customer" value="{{old("name_customer")}}" >
            @error('name_customer')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="medicines" class="col sm-2 col form-label @error('medicines') is-invalid @enderror">Obat</label>
        <div class="col-sm-10">
            @error('medicines')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <select name="medicines[]" class="form-control">
            <option disabled hidden option>Pesanan 1</option>
            @foreach ($Medicines as $item)
            <option value="{{$item['id']}}">{{$item['name']}}</option>
            @endforeach
           </select>
          {{-- div kosong buat nant disimpen html dari js --}}
          <div id="wrap-medicines"></div>
          <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()"> + tambah pesanan</p>
      </div>
      <button type="submit"class="btn btn-primary">Buat Pesanan</button>
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
              @foreach ($Medicines as $item)
                  <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
              @endforeach
          </select>`;
      //dengan Jquery, pada el dengan id wrap-medicines, ditambah html baru dari variable el dan disimpan di sebelum penutup tag wrap-medicinesnya
      $("#wrap-medicines").append(el);
      //Variable no di increments, agar berubah menjadi ditambah 1 tiap ada penambahan el html select tersebut
      no++;
  }
</script>
@endpush