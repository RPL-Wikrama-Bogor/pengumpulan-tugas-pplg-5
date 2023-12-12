@extends('layouts.template')

@section('content')
<form action="{{ route('kasir.order.store') }}" method="POST" class="card p-4 mt-5">
    @csrf
    <p class="mb-3">Penanggung Jawab : {{ Auth::user()->name }}</p>
    <div class="mb-3 row">
        <label for="name_customer" class="col-sm-2 col-form-label @error('name_customer') is-invalid @enderror">Nama Pembeli :</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" id="name_customer" name="name_customer" value="{{ old('name_customer') }}">
          @error('name_customer')
          <div class="text-danger">{{$message}}</div>
              
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
      <label for="password" class="col-sm-2 col-form-label @error('password') is-invalid @enderror">Obat:</label>
      <div class="col-sm-10">
        @error('medicines')
        <div class="text-danger">{{$message}}</div>
        @enderror
        <select name="medicines[]" class="form-control">
            <option disabled hidden selected>Pesanan 1</option>
            @foreach($medicines as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
        {{-- div kosong buat nanti dispman html dan js --}}
        <div id="wrap-medicines"></div>
        <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()">+ tambah pesanan</p>
      </div>
    </div>
     <button type="submit" class="btn btn-primary">Buat Pesenan</button>
    </form>

@endsection

@push('script')
<script>
    //nentuuin pesanan yang ke berapa
    let no = 2;
    function addSelect(){
        let el = `<select name="medicines[]" class="form-control mt-3">
            <option disabled hidden selected>Pesanan ${no}</option>
            @foreach($medicines as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>`;
        //dengan jquery ,pada el dengan id wrap-medicines ditambah html baru dari variabel el dan disimpan di sebelum menutup tag wrap
        //medicinesnya
       $("#wrap-medicines").append(el);

       //variabel no di increment agar berubah menjadi ditambah 1 tiap ada el html select trsbut
       no++;
    }

</script>
@endpush