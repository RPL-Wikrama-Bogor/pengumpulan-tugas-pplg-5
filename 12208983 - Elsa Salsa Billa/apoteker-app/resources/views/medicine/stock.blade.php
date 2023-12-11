@extends('layouts.template')

@section('content')
    {{--menampilkan alert success dr jquery ajax--}}
    <div id="msg-success"></div>
    <table class="table table-bordered table-striped mt-3">
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
            <td>{{ ($medicines ->currentpage()-1) * $medicines ->perpage() + $loop->index + 1 }}</td>
            <td>{{ $item['name'] }}</td>
            <td class="text-center">{{ $item['stock'] }}</td>
            <td class="d-flex justify-content-center">
                <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-stock" onclick="edit({{$item['id']}})">Tambah Stock</div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{--memunculkan pagination--}}
<div class="d-flex justify-content-end">
    {{--pagination dimunculin hanya jika dimedicines nya ada / > 0--}}
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
            {{--menyimpan alert danger--}}
            <div id="msg"></div>
            <div>
                <label for="name" class="form-label">Nama Obat :</label>
                <input type="text" name="name" id="name" class="form-control" disabled>
            </div>
            <div>
                <label for="stock" class="form-label">Stock Obat :</label>
                <input type="number" name="stock" id="stock" class="form-control">
            </div>
            {{-- input type hidden, digunakan untuk data yg nantinya berguna namun tdk ingin diperlihatkan ke user--}}
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
        //simpan url route yg edit kedalam variable url, untuk path parameternya disi dgn path dinamis versi js
        let url = "{{ route('medicine.show', "id") }}";
        //isi :id di url atas diisi dari id argument funcnya
        url = url.replace("id", id);

        // request ke server lewat js, hany abisa menggunakan perantara ajax
        $.ajax({
            // type method Route:: nya
            type:"GET",
            // url yg sudah dibuat diatas(yg mangil rote, url yg dituju)
            url: url,
            // tipe datanya bentuk json (hanya bisa ini)
            dataType: 'json',
            // kalo js berhasil memproses permintaan request ke url tersebut, yg akan dilakukan :
            success: function(res){
                //res akan berisi data hasil proses pengambilan diserver (request url nya)
                //memunculkan modal yg id nya tambah-stock
                $('#tambah-stock').modal('show');
                //element html yg id nya id pd hal ini, value nya akan diisi dgn data response bagian id, begitupun yg lainnya
                $('#id').val(res.id);
                $('#name').val(res.name);
                $('#stock').val(res.stock);
            }
        });
    }

    //ketika el html id tambah-stock disubmit formnya, akan menjalankan dunction yg mgamil seluruh bagian el dr tambah-stock tersebut (e)
    $("#tambah-stock").submit(function (e) {
        // form nya akan diambil alih seluruh prosesnya oleh js
        e.preventDefault();

        //variable id isinya value dari tag id="id"
        let id = $("#id").val();
        let url = "{{ route('medicine.stock.update', "id") }}";
        url = url.replace("id", id);
        //siapkan data yg akan dikirim ke Request $request
        let data = {
            stock: $("#stock").val(),
        };

        $.ajax({
            //type disamakan dgn Route::
            type: "PATCH",
            //kirim route name
            url: url,
            // kirim data Request $request
            data: data,
            cache: false,
            //kalau berhasil
            success: function (res) {
                $("#tambah-stock").modal("hide");
                //set session storage (penyimpanan browser sementara)
                // buat property data reloadAfterPAgeLoad pada session js
                sessionStorage.reloadAfterPageLoad = true;
                // refresh halaman
                window.location.reload();
            },
            error: function(err){
                //kalau err, id msg ditambah class isinya alert
                $('#msg').attr("class", "alert alert-danger");
                // isi text alert nya ambil dari responseJSON bagian message
                $('#msg').text(err.responseJSON.message);
            }
        })
    });

    $(function () {
        // kalau disession js nya ada property reloadAfterPageLoad
        if (sessionStorage.reloadAfterPageLoad) {
            // tambah class alert di id="msg-success"
            $('#msg-success').attr("class", "alert alert-success");
            // isi text dialertnya
            $("#msg-success").text("Berhasil menambhakan data stock!");
            //hapus session js tersebut agar alert hanya muncul seteah reload update data aja, reload selain itu ga dimunculkan
            sessionStorage.clear();
        }
    })
</script>
@endpush