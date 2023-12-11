

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 43%">
          {{ __('Tambah Obat') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <form action="create"class="mt-3 p-5" method="POST">
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                    
                @endif
            
              @if(Session::get('success'))
                <x-alert type="success" message="berhasil menambahkan data"></x-alert>  <br>          
               @endif
                            
                @csrf
            
              <div class="mb-3 row">
                {{-- for id name isinya sama kaya nama column di migrations --}}
                <label for="name" class="col-sm-2 col-form-label ">Nama Obat</label>
                <div class="col-sm-10">
                  <input type="text"  class="form-control" id="name" name="nama_obat" value="">
                  @error('name')
                  <div class="text-danger">{{$message}}</div>
                      
                  @enderror
                </div>
              </div>
              <div class="mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Type obat</label>
                <div class="col-sm-10">
                   
                    <select name="tipe" id="type" class="form-control">
                        <option selected hidden disabled>Pilih</option>
                        <option value="tablet">tablet</option>
                        <option value="syrup">syrup</option>
                        <option value="kapsul">kapsul</option>
                    </select>
                    @error('type')
                    <div class="text-danger">{{$message}}</div>
                        
                    @enderror
                </div>
              </div>
              <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label ">Harga Obat :</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="price" name="harga" value="{{ old('name') }}" >
                  @error('price')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
            
                <div class="mb-3 row">
                    <label for="stock" class="col-sm-2 col-form-label">Stok  awal :</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="stock" name="stokawal" value="{{ old('name') }}">
                      @error('stock')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
            
                </div>
                <button type="submit" class="btn btn-primary">kirim data </button>
            </form>
            
            
          </div>
      </div>
  </div>
</x-app-layout>
