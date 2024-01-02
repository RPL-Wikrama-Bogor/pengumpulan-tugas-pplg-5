@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Edit Data Siswa</h1>
    <p>Home | Data Master | <span style="font-weight: bold">Edit Data Siswa</span></p>
</div>
<form action="{{ route('students.update', $student->id) }}" class="card bg-light mt-3 p-5 ml-[300px]" method="POST">
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @csrf
    @method('PATCH')
    <div class="mb-3 row">
        <label for="nis" class="col-sm-2 col-form-label">Nis: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nis" name="nis" value="{{ $student->nis }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
        </div>
    </div>
    <div class="mb-3 row">
    <label for="rombel_id" class="col-sm-2 col-form-label">Rombel :</label>
    <div class="col-sm-10">
        <select class="form-select" name="rombel_id" id="rombel_id">
            <option selected disabled hidden>Pilih</option>
            @foreach($rombels as $rom)
                <option value="{{ $rom['rombel'] }}" {{ $student->rombel_id == $rom->id ? 'selected' : '' }}>
                    {{ $rom->rombel }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="rayon_id" class="col-sm-2 col-form-label">Rayon :</label>
    <div class="col-sm-10">
        <select class="form-select" name="rayon_id" id="rayon_id">
            <option selected disabled hidden>Pilih</option>
            @foreach($rayons as $rayon)
                <option value="{{ $rayon['rayon'] }}" {{ $student->rayon_id == $rayon->id ? 'selected' : '' }}>
                    {{ $rayon->rayon }}
                </option>
            @endforeach
        </select>
    </div>
</div>
    <button type="submit" class="btn btn-primary bg-blue-700">Edit data</button>
</form>
@endsection
