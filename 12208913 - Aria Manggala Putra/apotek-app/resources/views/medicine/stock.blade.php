@extends('layouts.template')
@section('content')
<div id="msg-success"></div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($medicines as $item)
            <tr>
                <td>{{ ($medicines ->currentpage()-1) * $medicines ->perpage() + $loop->index + 1 }}
                </td>
                <td>{{ $item['name']}}</td>
                <td class="text-center">{{$item['stock']}}</td>
                <td class="d-flex justify-content-center">
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-stock" onclick="edit({{$item['id']}})">Tambah Stock</div>
                </td>
            </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- memunculkan pagination --}}
    <div class="d-flex justify-content-end">
        {{-- pagination dimunculin hanya jika data medicines nya ada / > 0 --}}
        @if($medicines->count())
            {{ $medicines->links()}}
            @endif
    </div>
    <!-- Modal -->
<div class="modal fade" id="tambah-stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Stock</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
        <div class="modal-body">
            <div id="msg"></div>
            <div>
                <label for="name" class="form-label">Nama Obat:</label>
                <input type="numbeer" name="name" id="name" class="form-control" disabled>
            </div>
            <div>
                <label for="stock" class="form-label">Stock</label>
                <input type="numbeer" name="stock" id="stock" class="form-control">
            </div>
            {{-- input type hidden, digunakan untuk data yang nantinya berguna namun tidak ingin diperlihatkan ke user --}}
            <input type="hidden" name="id" id="id">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>
    @endsection


    @push('script')
        <script>
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
                }
            });
            
        function edit(id){
            //simpan url route yang edit kedalam variable url, untuk path paramernya diisi dengan path dinamis versi js
            let url = "{{ route('medicine.show', "id") }}";
            // isi :id di url atas diisi dari id argument func nya
            url = url.replace("id", id);
           
            // request ke server lewat javascript, hanya bisa menggunakan perantara ajax 
            $.ajax({
                //type method Route:: nya
                type:"GET",
                // url yang sudah dibuat diatas (yg manggil route, url yg dituju)
                url: url,
                //tipe datanya berbentuk json(hanya bisa json)
                dataType: 'json',
                //jika js berhasil memproses permintaan request ke url tersebut, yang dilakukan :
                success: function (res){
                    //res akan berisi data dari hasil proses pengambilan di server (request url nya)
                    //memunculkan modal yang id nya tambah-stock
                    $('#tambah-stock').modal('show');
                    //element html yang id nya id pada halaman ini, value nya akan diisi dengan data response bagian id, begitupun yang lainnya
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#stock').val(res.stock);
                }
            })

        }

        //ketika el html id tambah-stock di submit formnya, akan menjalankan function yang mengambil seluruh bagian el dr tambah-stock tersebut
        $("#tambah-stock").submit(function(e){
            // form nya akan di ambil alih seluruh proses nya oleh javascript
            e.preventDefault();

            let id = $("#id").val();
            let url = "{{route('medicine.stock.update', "id") }}";
            url = url.replace("id", id);
            let data = {
                stock: $("#stock").val(),
            };

            $.ajax({
                type:"PATCH",
                url: url,
                data: data,
                cache: false,
                success: function (res){
                    $("#tambah-stock").modal("hide");
                    sessionStorage.reloadAfterPageLoad = true;
                    windom.location.reload();
                },
                error: function(err){
                    $('#msg').attr("class","alert alert-danger");
                    $('#msg').text(err.responseJSON.message);
                }
                
            })
        });

        $(function(){
            if (sessionStorage.reloadAfterPageLoad){
                $('#msg-success').attr("class","alert alert-success");
                $('#msg-success').text("Berhasil menambahkan data stock!");
                sessionStorage.clear();
            }
        });

    </script>

    @endpush
