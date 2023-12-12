@extends('layouts.template')

   @section('content')
   {{-- @if (Session::get('success'))
   <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
   @if (Session::get('deleted'))
      <div class="alert alert-warning">{{Session::get('deleted')}}</div>
    @endif --}}
    {{-- menampilkan alert success dr jquery --}}
    <div id="msg-success"></div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>nama</th>
            <th class="text-center">stok</th>
            <th class="text-center">aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no =1; @endphp
        @foreach ($medicines as $item)
        <tr>
            <td>{{ ($medicines->currentpage()-1) * $medicines->perpage() + $loop->index +1}}</td>
            <td>{{ $item['name'] }}</td>
            <td class="text-center">{{ $item['stock'] }} </td>
            <td class="d-flex justify-content-center">
              <div class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#tambah-stock" onclick="edit({{$item['id']}})"><i class="fa-solid fa-notes-medical"></i>Tambahstock</div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{-- memunculkan pagination --}}
<div class="d-flex justify-content-end">
    {{-- pagination dimunculin hnya jika medicines nya ada --}}
    @if ($medicines->count())
    {{$medicines->links()}}
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
                <label for="name" class="form-label">Nama Obat :</label>
                <input type="text" name="name" id="name" class="form-control" disabled>
            </div>
            <div>
                <label for="stock" class="form-label">Stock :</label>
                <input type="number" name="stock" id="stock" class="form-control">
            </div>
            {{--input ype hidden, digunakna untuk data yg natinya berguna namun tidak ingin diperlihatkan ke user--}}
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function edit(id) {
            // simpan url route yang edit kedalam variable url, untuk path parameternya diisi dengan path dinamis versi js
            let url = "{{ route('medicine.show', "id") }}";
            //isi :id di url atas diisi dari id argument func nya
            url = url.replace("id", id);

            //request ke server lewat javascript, hanya bisa menggunakan perantara ajax
            $.ajax({
                //type method Route:: nya
                type:"GET",
                //url yang sudah dibuat diatas(yg manggil route, url yang dituju)
                url:url,
                dataType:'json',

                //kalo js berhasil memproses permintaan request ke url tersebut, yang akan dilakukan:
                success: function(res) {
                    //ress akan berisidata hasil proses pengambilan di server(request url nya)
                    //memunculkan modal yang id nya tambah-stock
                    $('#tambah-stock').modal('show');

                    //element html yg id nya id pada halaman ini, value nya akan diisi dengan data response bagian id , begitupun yang lainnya
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#stock').val(res.stock);
                }
            });
        }

        $("#tambah-stock").submit(function (e) {
            // from nya akan di ambil alih seluruh prosesnya oleh javascript
            e.preventDefault();

            //variable id isinya value dari tag id="id"
            let id = $("#id").val();
            let url = "{{ route('medicine.stock.update', "id") }}";
            url = url.replace("id", id);

            let data = {
                stock: $("#stock").val(),
            };

            $.ajax({
                type:"PATCH", //sama dengan yang di routenya
                url:url, //mengirim route name nya
                data:data, //kirim data Request $request
                cache: false,
                success: function (res){
                    $("#tambah-stock").modal("hide");
                    //set session storage (penyimpanan browser sementara)
                    // buat property data reloadAfterPageLoad pada session js
                    sessionStorage.reloadAfterPageLoad = true;
                    //refresh halaman
                    window.location.reload();
                },
                error: function (err){
                    // kalau err, id msg ditambah class isinya alert
                    $('#msg').attr("class", "alert alert-danger");
                    // isi text alert nya ambil dr responseJSON bagian message
                    $('#msg').text(err.responseJSON.message);

                }
            })
        });

        // function tanpa nama dijalankan ketika web baru selesai reload
        $(function () {
            // kalau di session js nya ada property reloadAfterPageLoad
            if (sessionStorage.reloadAfterPageLoad) {
                // tambah class alert di id="msg-success"
                $('#msg-success').attr("class", "alert alert-success");
                // isi text di alertnya
                $("#msg-success").text("Berhasil menambahkan data stok!");
                // hapus session js tersebut agar alert hanya muncul setelah reload update aja, reload selain itu ga dimunculkan
                sessionStorage.clear();
            }
        })
    </script>
@endpush
