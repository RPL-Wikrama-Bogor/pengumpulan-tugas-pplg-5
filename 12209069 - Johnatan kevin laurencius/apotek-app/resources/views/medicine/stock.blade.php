@extends('layouts.template')

@section('content')
    <div id="msg-success"></div>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($medicines as $item)
                <tr>
                    <td>{{ ($medicines ->currentpage()-1) * $medicines ->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td class="text-center">{{ $item['stock'] }}</td>
                    <td class="d-flex justify-content-center">
                        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-stock" onclick="edit({{$item['id']}})">Tambah Stok</div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- memunculkan pagination --}}
    <div class="d-flex justify-content-end">
        {{-- pagination dimunculkan hanya jika dalam medicines nya ada / > 0 --}}
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
            <form method="post">
            <div class="modal-body">
                <div id="msg"></div>
                <div>
                    <label for="name" class="form-label">Nama Obat :</label>
                    <input type="text" name="name" id="name" class="form-control" disabled>
                </div>
                <div>
                    <label for="stok" class="form-label">Stok :</label>
                    <input type="number" stok="stok" id="stock" class="form-control">
                </div>
                {{-- input type hidden, digunakan untuk data yang nantinya berguna namun tidak ingin diperlihatkan ke user --}}
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer">
            </form>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
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
        })
        function edit(id)
        {
            // simpan url route yang edit kedalam variable url, untuk path parameternya diisi dengan path dinamis versi js
            let url = "{{ route('medicine.show', "id")}}";
            // isi :id di url atas diisi dari id argumentnya
            url = url.replace("id", id);

            // request ke server lewat javascript, hanya bisa menggunakan perantara ajax
            $.ajax({
                // type method Route:: nya
                type:"GET",
                // url yang sudah dibuat diatas (hanya bisa ini)
                url: url,
                // tipe datanya bentuk json (hanya bisa ini)
                dataTYpe: 'json',
                // kalo javascript berhasil memproses permintaan request ke url tersebut, yang akan dilakukan :
                success: function(res){
                    // res akan berisi data hasil proses pengambilan di server (request urlnya)
                    // memunculkan modal yang idnya ditambah tambah-stock
                    $('#tambah-stock').modal('show');
                    // element html yang id nya id pada halaman ini, valuenya akan diisi dengan data response bagian id, begitupun yang lain
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#stock').val(res.stock);
                    
                }
            })
        }

        // ketika el html id tambah-stock di submit formnya, akan emnjalankan funciton yang mengambil seluruh bagian el dari tambah-stock tersebut (e)
        $("#tambah-stock").submit(function (e) {
            // form nya akan di ambil alih seluruh proses nya oleh javascript
            e.preventDefault();

            // variable id isinya value dari tag id = "id"
            let id = $("#id").val();
            let url = "{{ route('medicine.stock.update', "id")}}";
            url = url.replace("id", id);

            let data = {
                stock: $("#stock").val(),
            };

            $.ajax({
                // type disamakan dengan Route::
                type: "PATCH",
                // kirim route name
                url: url,
                //kirim data request $request
                data: data,
                cache: false,
                // kalau berhasil
                success: function (res) {
                    $('#tambah-stock').modal("hide");
                    // set session storage (penyimpanan browser sementara)
                    // buat property data reloadAfterPageLoad pada session js
                    sessionStorage.reloadAfterPageLoad = true;
                    // refresh halmaan
                    window.location.reload()
                },
                error: function(err) {
                    // kaalau err, id msg ditambah class isinya alert
                    $('#msg').attr('class', "alert alert-danger");
                    // isi teks alertnya diambil dari responseJSON bagian message
                    $('#msg').text(err.responseJSON.message);
                }
            })
        });

        
        $(function () {
            if (sessionStorage.reloadAfterPageLoad) {
                $('#msg-success').attr("class", "alert alert-success");
                $('#msg-success').text("Berhasil menambahkan data stock!");
                sessionStorage.clear();
            }
        })
    </script>
@endpush
