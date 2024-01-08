@extends('layouts.template')

@section('content')
<br>
<form action="{{ route('medicine.store') }}" class="card mt-3 p-5" method="POST">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (Session::get('success'))
        <div class="alert alert-succes">{{Session::get('success')}}</div> 
        @endif
    {{-- token syarat kiriim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
    @csrf 
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label @error('name')is-invalid @enderror">Nama Obat :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
          @error('name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
     <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Tipe Obat :</label>
        <div class="col-sm-10">
            <select name="type" class="form-control" id="type">
                <option selected hidden disabled>Pilih</option>
                <option value="tablet" {{old('type') == 'tablet' ? 'selected' : ''}}>tablet</option>
                <option value="sirup"{{old('type') == 'sirup' ? 'selected' : ''}}>sirup</option>
                <option value="kapsul"{{old('type') == 'kapsul' ? 'selected' : ''}}>kapsul</option>
            </select>
        </div>
     </div>
     <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Harga Obat :</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="price" name="price">
        </div>
      </div>
    
     <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Stock Awal :</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="stock" name="stock">
        </div>
      </div>
    
      <button type="submit" class="btn btn-primary">Kirim Data</button>
</form>
@endsection
