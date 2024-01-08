@extends('layouts.template')
@section('content')
    <h1>Tambah Data</h1>

    <form action="{{route('rayons.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="rayon">Rayon:</label>
            <input type="text" class="form-control" id="rayon" name="rayon">
       <label for="user_id">Pembimbing Siswa</label>
        <select class="form-control" name="user_id" id="">
            @foreach ($datarayon as $item)
                 <option value="{{$item->name}}">{{$item->name}}</option>
            @endforeach
           
            
        </select>   <br>
          </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
<style>
    .form-group{
        
    }
</style>
