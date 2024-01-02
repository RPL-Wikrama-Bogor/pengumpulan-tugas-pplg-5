@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Edit Data Rayon</h1>
    <p>Home | Data Master | Data Rayon | <span style="font-weight: bold">Edit Data Rayon</span></p>
</div>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('rayon.update', $rayon->id) }}" method="post" class="card bg-light mt-3 p-5 ml-[300px]">
        @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="rayon" class="col-sm-2 col-form-label">Rayon :</label>
            <div class="col-sm-10">
                <input type="text" name="rayon" id="rayon" class="form-control" value="{{ $rayon->rayon }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="PS" class="col-sm-2 col-form-label">Pembimbing Rayon:</label>
            <div class="col-sm-10">
                <select name="PS" id="PS" class="form-control">
                    <option selected disabled>Pilih</option>
                    <option {{ $rayon->PS === 'PS WIkrama 1' ? 'selected' : '' }}>PS WIkrama 1</option>
                    <option {{ $rayon->PS === 'PS Cicurug 5' ? 'selected' : '' }}>PS Cicurug 5</option>
                    <option {{ $rayon->PS === 'PS Tajur 3' ? 'selected' : '' }}>PS Tajur 3</option>
                    <option {{ $rayon->PS === 'PS Ciawi 4' ? 'selected' : '' }}>PS Ciawi 4</option>
                    <option {{ $rayon->PS === 'PS Cibeduk 2' ? 'selected' : '' }}>PS Cibedug 2</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary bg-blue-700" type="submit">Edit data</button>
    </form>
    <br>
@endsection