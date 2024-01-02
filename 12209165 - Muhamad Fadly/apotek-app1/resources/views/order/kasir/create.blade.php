@extends('layouts.template')

@section('content')
<form action="{{ route('kasir.order.store')}}" class="card p-4 mt-5" method="POST">
    @csrf
    <p class="mb-3">Penanggung Jawab: {{ Auth::user()->name }}</p>
    <div class="mb-3 row mt-3">
        <label for="text" class="col-sm-2 col-form-label" @error('name_customer')@enderror>nama penbeli</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name_customer" name="name_customer" value="{{old('name_customer') }}">
          @error('name_customer')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="medicines" class="col-sm-2 col-form-label" @error('medicines') is-invalid @enderror>obat : </label>
          <div class="col-sm-10">
            @error('medicines')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <select name="medicines[]" class="form-control mt-3">
                <option disabled hidden selected>pesanan 1</option>
                @foreach ($medicines as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
            <div id="wrap-medicines"></div>
                <p class="text-primary mt-3" style="cursor: pointer" onclick="addSelect()">+ tambahan pesanan</p>
          </div> 
      </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Buat pesanan</button>
</form>

@endsection
@push('script')
<script>
    let no = 2;
    function addSelect(){
        let el =`<select name="medicines[]" class="form-control mt-3">
                <option disabled hidden selected>pesanan ${no}</option>
                @foreach ($medicines as $item)
                <option value="{{$item['id']}}">{{$item['name']}} </option>
                @endforeach
            </select>`;
            $('#wrap-medicines').append(el);
            no++;
            }
</script>
    
@endpush