@extends('layouts.template')

@section('content')
    <form action="{{ route('medicine.update', $medicine['id']) }}" class="card mt-3 p-5" method="POST">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div> 
        @endif
        {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
        @csrf
        {{-- menimpa nilai dr attr method di form, agar saka kaya yang ada di routenya--}}
        @method('PATCH')
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kaya nama column di migrationnya--}}
            <label for="name" class="col-sm-2 col-form-label">Nama Obat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $medicine['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Type Obat :</label>
            <div class="col-sm-10">
                <select name="type" id="type" class="form-control">
                    <option selected hidden disabled>Pilih</option>
                    <option value="tablet" {{ $medicine['type'] == 'tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="sirup" {{ $medicine['type'] == 'sirup' ? 'selected' : '' }}>Sirup</option>
                    <option value="kapsul" {{ $medicine['type'] == 'kapsul' ? 'selected' : '' }}>Kapsul</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga Obat :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price" value="{{ $medicine['price'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection