@extends('layouts.template')

@section('content')
    <form action="{{ route('medicine.update', $medicine['id']) }}" class="card mt-3 p-5" method="post">
        {{-- kalau ada erorr validasi, akan ditampilkan disini --}}
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
        @csrf
        {{-- menimpa nilai dri attr method di form, agar sama kaya yang di routenya--}}
        @method('PATCH')
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kayak nama column di migrationnya --}}
            <label for="name_obat" class="col-sm-2 col-form-label">Nama Obat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ $medicine['name'] }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Type Obat :</label>
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
            <label for="price" class="col-sm-2 col-form-label">Harga Obat :</label>
            <div class="col-sm-10">
                <input type="number" name="price" id="price" class="form-control" value="{{ $medicine['price'] }}">
            </div>
        </div>
       
        <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection
