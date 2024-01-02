@extends('layouts.template')

@section('content')
    <form action="{{ route('medicine.update' , $medicine['id']) }}"class="card mt-3 p-5" method="POST">
    @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        @endif
        {{--kalau kedeteksi ada with section namanya 'succes' pas masuk ke halaman ini, msg nya bakal dimunculin disini--}}
        @if (Session::get('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        {{--token syarat kirim data (agar system membaca bahwa data ini berasal dari sumber yg sah)--}}
        @csrf

        {{-- for, id, name isinya sama kayak nama column di migrationnya --}}

    {{--token syarat kirim data (agar system membaca bahwa data ini berasal dari sumber yg sah)--}}
        @csrf

        @method('PATCH')
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kaya nama column di migrationnya--}}
            <label for="name" class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Nama Obat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{$medicine['name'] }}">
                @error('name')
                    <div class="text-denger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Type Obat :</label>
            <div class="col-sm-10">
                <select name="type" id="type" class="form-control">
                    <option selected hidden disabled>Pilih</option>
                    <option value="tablet"{{ $medicine['type'] =='tablet' ? 'selected' :'' }}>tablet</option>
                    <option value="sirup"{{ $medicine['type'] =='sirup' ? 'selected' :'' }}>sirup</option>
                    <option value="kapsul"{{ $medicine['type'] =='kapsul' ? 'selected' :'' }}>kapsul</option>

                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga Obat :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price" value="{{ $medicine['price'] }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">kirim Data</button>
    </form>

@endsection
