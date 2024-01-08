@extends('layouts.template')
@section('content')
<h1>Edit data</h1>

    <form action="{{route('rayons.update',$datarayon->id)}}" method="post">

    {{ csrf_field() }}
    @method('PATCH')
<input class="form-control" type="text" name="rayon" value="{{$datarayon->rayon}}">
<input class="form-control" type="text" name="user_id" value="{{$datarayon->user_id}}">
<button type="submit" class="btn btn-primary">Kirim</button>
    </form>
@endsection