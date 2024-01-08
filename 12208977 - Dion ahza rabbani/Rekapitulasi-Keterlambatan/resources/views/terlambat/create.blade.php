@extends('layouts.template')
@section('content')
    <form action="{{ route('terlambat.store')}}" method="post" class="form-container">
        <div class="form-group">
            <label for="name_id">Siswa:</label>
            
               <select name="name_id" id="name_id" class="form-control">
                @foreach ($datasiswa as $item)
                <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
            </select> 
            
        </div>

        <div class="form-group">
            <label for="date_time_late">Tanggal Keterlambatan:</label>
            <input type="datetime-local" name="date_time_late" id="date_time_late" class="form-control">
        </div>

        <div class="form-group">
            <label for="information">Informasi:</label>
            <input type="text" name="information" id="information" class="form-control">
        </div>

        <div class="form-group">
            <label for="bukti">Bukti:</label>
            <input type="file" name="bukti" id="bukti" class="form-control">
        </div>

        {{ csrf_field() }}

        <button class="btn btn-primary" type="submit">Tambah</button>
    </form>
@endsection

<style>
    .form-container {
    /* Gaya CSS untuk form */
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="datetime-local"],
select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
}

button:hover {
    background-color: #0056b3;
}

</style>