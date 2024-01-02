@extends('layouts.template')

@section('content')
<form action="{{ route('medicine.update', $medicine['id']) }}" method="post" class="mt-4">
    
    {{-- Send data to the database --}}
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>    
    @endif

    {{-- If there is a 'success' session variable, display the message on this page --}}


    @csrf
    @method('PATCH')

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Obat:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $medicine['name'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Type Obat:</label>
        <div class="col-sm-10">
            <select name="type" id="type" class="form-control">
                <option selected hidden disabled>Pilih Type Obat</option>
                <option value="tablet" {{ $medicine['type'] == 'tablet' ? 'selected' : '' }}>Tablet</option>
                <option value="sirup" {{ $medicine['type'] == 'sirup' ? 'selected' : '' }}>Sirup</option>
                <option value="kapsul" {{ $medicine['type'] == 'kapsul' ? 'selected' : '' }}>Kapsul</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga Obat:</label>
        <div class="col-sm-10">
            <input type="number" name="price" id="price" class="form-control" value="{{ $medicine['price'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Stok Awal:</label>
        <div class="col-sm-10">
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $medicine['stocks'] }}">
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
</form>
@endsection
