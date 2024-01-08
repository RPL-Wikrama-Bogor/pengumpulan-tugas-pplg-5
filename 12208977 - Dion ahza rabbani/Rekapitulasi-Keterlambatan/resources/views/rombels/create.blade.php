@extends('layouts.template')
@section('content')
@if(session('status'))
    <div class="alert alert-success">
       {{ (session('status'))}}
       <a href="{{route('rombels.index')}}">kembali</a>
    </div>
@endif

    

   
        <h1>Tambah Rombel</h1>
        <form action="{{ route('rombels.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="rombel" class="form-label">Rombel</label>
                <input type="text" class="form-control" id="rombel" name="rombel" placeholder="Masukkan nama rombel">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    
@endsection
