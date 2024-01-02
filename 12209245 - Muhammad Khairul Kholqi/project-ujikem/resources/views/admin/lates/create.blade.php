@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Tambah Data Keterlambatan</h1>
    <p class=" mt-[10px] mb-[10px]">Home | Data Keterlambatan | <span class="font-bold">Tambah Data Keterlambatan</span></p>
</div>
<form action="{{ route('lates.store') }}" method="post" class="card mt-5 p-5 ml-[300px]" enctype="multipart/form-data">
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @csrf
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">Siswa</label>
        <div class="col-sm-10">
            <select class="form-select" name="student_id" id="id">
                <option selected disabled hidden>Pilih</option>
                @foreach($student as $std)
                    <option value="{{ $std['id'] }}">{{ $std['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            <input type="datetime-local" name="date_time_late" class="form-control">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="information" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
            <textarea name="information" class="form-control col-sm-10" placeholder="Tambahkan keterangan.." id="information"></textarea>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="bukti" class="col-sm-2 col-form-label">Bukti</label>
        <div class="col-sm-10">
            <input name="bukti" type="file" class="form-control" id="bukti" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
    </div>
    <button class="btn btn-primary bg-blue-700" type="submit">Tambah data</button>
</form>
<br>
@endsection
