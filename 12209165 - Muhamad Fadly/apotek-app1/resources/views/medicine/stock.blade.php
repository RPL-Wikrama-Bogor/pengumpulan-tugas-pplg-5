@extends('layouts.template')

@section('content')
<br>
{{-- memapilakan alert success dari jquery ajax --}}
<div id="msg-success"></div>


<div class="container">
    <table class="table table-bordered table-striped mt-5">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>nama</th>
                <th>stock</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($medicines as $item)
                <tr class="text-center">
                    <td>{{ ($medicines->currentpage()-1) * $medicines->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td class="d-flex justify-content-center">
                        <div type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-stock" onclick="edit({{$item['id']}})">
                            Tambah stock
                        </div>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- memunculkan pagination --}}
    <div class="d-flex justify-content-end">
        @if ($medicines->count())
            {{$medicines->links()}}
        @endif
    </div>
    <!-- Modal -->
<div class="modal fade" id="tambah-stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">tambah data stock</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
         {{-- {{ route('medicine.update', ['id' => $item['id']]) }} --}}
        <form action="" method="POST">
        <div class="modal-body">
            
            {{--menyimpanan danger--}}
          <div id="msg"></div>
            <div>
                <label for="name" class="form-labe">nama obat</label>
                <input type="text" name="name" id="name" class="form-control" disabled> 
            </div>
            <div>
                <label for="stock" class="form-label">stock :</label>
                <input type="number" name="stock" id="stock" class="form-control">
            </div>  
            <input type="hidden" name="id" id="id">
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection

@push('script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        function edit(id) {
            //simpan url route yang di edit kedalam variabel url, untuk path paremternya di isi dengan path dinamis versi js
            let url = "{{route('medicine.show', "id")}}";
            //isi :id di rul di atas di isi dari id argument func nya
            url = url.replace("id", id);
            //request ke server lewat js , hanya bisa mengunakan ajax
            $.ajax(
                {
                    //type method route:: nya
                    type: "GET",
                    //url yang sudah di buat di atas(yg manggil route, url yg di tuju)
                    url: url,
                    //tipe data responsenya bentuk json(hanya bisa ini)
                    dataType: 'json',
                    // kalau js berhasil memperoses pemintaan request url tersebut ,yang di lakukan
                    success: function(res){
                        // $('#tambah-stock form').attr('action', "{{ route('medicine.update', 'id') }}".replace('id', res.id));
                        $("#tambah-stock").modal('show');
                        $('#id').val(res.id);
                        $('#name').val(res.name);
                        $('#stock').val(res.stock);
                    }
                }
            )
        }
        // ketika el html id tambah-stock di submit form nya, akan menajlankan function yg memangil seluruuh bagian el dr tambah-stock tersebut(e)
        $("#tambah-stock").submit(function (e) {
            // form yang di ambil alih seluruh preoses nya ole js
            e.preventDefault();

            //variable id di isinya value dari tag id="id"
            let id= $('#id').val();
            let url = "{{ route('medicine.stock.update', "id")}}";
            url = url.replace("id",id);
            //siap kan data yang di kirim ke request $request
            let data = {
                stock: $('#stock').val()
            };

            $.ajax({
                type: "PATCH",
                url: url,
                data: data,
                cache: false,
                
                success: function(res) {
                    $("#tambah-stock").modal('hide');
                    sessionStorage.reloadAfterPageLoad = true;
                    window.location.reload();
                    
                },
                error: function(err){
                    $("#msg").attr("class", "alert alert-danger");
                    $("#msg").text(err.responseJSON.message);
                }
            })
            
        });
        // function tanpa nama dijalan kan ketika web baru selesai reload
        $(function (){
            //kalau di session js nya ada property reloadAfterPageLoad
            if (sessionStorage.reloadAfterPageLoad) {
                //tambah class alert di id="msg-success"
                $('#msg-success').attr("class", "alert alert-success");
                //isi text di alertnya
                $('#msg-success').text("berhasil menambahkan data!");
                //hapus session js tersebut agar arlet hanya muncul setelah reload update data aja, reload selein itu ga dimunculkan
                sessionStorage.clear();
                
            }
        });
    </script>
    
@endpush