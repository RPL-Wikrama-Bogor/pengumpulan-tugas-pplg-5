@extends('layouts.template')

@section('content')
    {{-- menampilkan alert success dari jquery ajax --}}
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
            @php $no = 1; @endphp
            @foreach ($medicines as $item)
            <tr>
                <td>{{ ($medicines ->currentpage()-1) * $medicines ->perpage() + $loop->index + 1 }}</td>
                <td>{{ $item['name'] }}</td>
                <td class="text-center">{{ $item['stock'] }}</td>
                <td class="d-flex justify-content-center">
                    <div class="btn btn-primary" onclick="edit({{$item['id']}})">Tambah Stock</div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($medicines->count())
            {{$medicines->links()}}
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah-stock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Stock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        {{-- menyimpan alert danger --}}
                        <div id="msg"></div>
                        <div>
                            <label for="name"class="form-table">Nama Obat : </label>
                            <input type="text" name="name" id="name" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="stock" class="form-label">Stock : </label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                            {{--input type hidden, digunakan untuk data yang nantinya berguna namun tidak ingin diperlihatkan ke user--}}
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
            let url = "{{ route('medicine.show' , "id") }}" ;

            //isi :id di url atas diisi dari id argument func nya
            url = url.replace("id", id) ;

            //request ke server lewat javascript, hanya bisa menggunakan perantara ajax
            $.ajax({
                //type method Route:: nya
                type : "GET" ,

                //url yang sudah dibuat diatas(yg manggil route, url yang dituju)
                url : url ,
                dataType : 'json',

                //kalo js berhasil memproses permintaan request ke url tersebut, yang akan dilakukan:
                //res nya bisa diganti asal sama saat ambil data sebelum titik
                success: function (res) {
                    //ress akan berisidata hasil proses pengambilan di server(request url nya)
                    //memunculkan modal yang id nya tambah-stock
                    $('#tambah-stock').modal('show') ;

                    //element html yg id nya id pada halaman ini, value nya akan diisi dengan data response bagian id ,
                    // begitupun yang lainnya
                    $('#id').val(res.id) ;
                    $('#name').val(res.name) ;
                    $('#stock').val(res.stock) ;
                }
            });
        }

        //ketika el html id tambah-stock di submit formnya , akan menjalankan functi0n 
        //yang mengambil seluruh bagian el dari tambah-stock tersebut (e)
        //e untuk mengambil alih seluruh inputan / elemen(tambah-stock) e/event 
        $("#tambah-stock").submit(function(e){
            //form nya akan diambil alin seluruh proses nya oleh javascript
            e.preventDefault();

            //variable id isinya value dari tag id="id"
            let id = $("#id").val();
            let url = "{{ route('medicine.stock.update', "id") }}";
            url = url.replace("id", id);
            //siapkan data yang akan dikirim ke request $request
            let data = {
                //upate data stock saja dipanggil id nya (stock)
                stock: $("#stock").val(),
            };

            $.ajax({
                //type di samakan dengan route
                type:"PATCH",
                //kirim route name
                url: url,
                //kirim data request $request
                data: data,
                //fungsi nya  tidak mengirim data sampah seperti riwatay session dll
                cache: false,
                //kalau berhasil
                success: function (res) {
                    $("#tambah-stock").modal("hide");
                    //set session storage (penyimpanan browser sementara)
                    //buat property data reloadAfterPageLoad pada session js
                    sessionStorage.reloadAfterPageLoad = true;
                    //refresh halaman
                    window.location.reload();
                },
                error: function(err) {
                    //kalau err, id msg ditambah class isinya alert
                    $('#msg').attr("class", "alert alert-danger");
                    // isi text alert nya diambil dari responseJSON bagian message
                    $('#msg').text(err.responseJSON.message);
                }
            })
        });

        // function tanpa nama dijalankan ketika web baru selesai reluad
        $(function () {
            // kalau di session js nya ada property reloadAfterPageLoad
            if (sessionStorage.reloadAfterPageLoad){
                //tambah class alert di id="msg-success"
                $('#msg-success').attr("class", "alert alert-success");
                //isi text di alertnya
                $("#msg-success").text("Berhasil menambahkan data stock !");
                //hapus section js tersebut agar alert hanya muncul setelah 
                //reload update data saja, reload selain itu tidak dimunculkan
                sessionStorage.clear();
            }
        })
    </script>
@endpush