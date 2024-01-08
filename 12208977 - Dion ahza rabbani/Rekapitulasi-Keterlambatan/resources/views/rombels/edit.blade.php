@extends('layouts.template')
@section('content')

    <h1>Edit data</h1>
    
        <form action="{{route('rombels.update',$datarombel->id)}}" method="post">
    
        {{ csrf_field() }}
        @method('PATCH')
        
    <input class="form-control" type="text" name="rombel" id="" value="{{$datarombel->rombel}}">
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
    
@endsection