@extends('layouts.template')
@section('content') 
<h1>Data Siswa</h1>
<form action="{{route('siswa.store')}}" method='post'>
    {{ csrf_field() }}
    <label for="nis">NIS</label>
    <input type="text" class="form-control" name="nis">
    <label for="Name">Nama</label>
    <input type="text" class="form-control" name="name">
    <label for="rombel">Rombel</label>
    <select class="form-control" name="rombel_id" id="">
        @foreach ($datarombel as $item)            
        <option value="{{$item->rombel}}">{{$item->rombel}}</option> 
               @endforeach
    </select>
    <label for="Rayon">Rayon</label>
    <select class="form-control" name="rayon_id" id="">
        @foreach ($datarayon as $item)
            <option value="{{$item->rayon}}">{{$item->rayon}}</option>
        @endforeach
        
    </select>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
@endsection