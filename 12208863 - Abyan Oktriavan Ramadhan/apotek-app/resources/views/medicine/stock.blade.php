@extends('layouts.template')

@section('content')
    {{-- menampilkan alert success dr jquery ajax --}}
    <div id="msg-success"></div>
    <h1 class="display-4">
        <b>Daftar Obat</b>
    </h1>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th class="text-center">stock</th>
            <th class="text-center">Aksi</th>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($medicines as $item)
                <tr>
                    <td>{{ ($medicines->currentpage() - 1) * $medicines->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td class="d-flex justify-content-center">
                        <!-- Button trigger modal -->
                        <div onclick="edit({{ $item['id'] }})" class="btn btn-primary">
                            Ubah stock
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{-- pegination dimunculin hanya jika data medicinesnya ada / > 0 --}}
        @if ($medicines->count())
            {{ $medicines->links() }}
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah-stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah data stock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST">
                    <div class="modal-body">
                        <div id="msg"></div>
                        <div>
                            <label for="name" class="form-label">Nama obat</label>
                            <input type="text" name="name" id="name" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="stock" class="form-label">Stock :</label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                        {{-- input tupe hidden digunakan untuk data yang nantinya berguna namun tidak ingin di perlihatkakn ke user --}}
                        <input type="hidden" name="id" id="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
            // simpan irl route yang edit kedalam bariable url, untuk path parameternya diisi dengan path dinamis versi js
            let url = "{{ route('medicine.show', 'id') }}";
            // isi :id di irl atas diisis dari id argument  func nya
            url = url.replace("id", id);

            //request server lewat JS, hanya bisa menggunakan perantara ajax
            $.ajax({
                // type method Route:: nya
                type: "GET",
                // url yang sudah bisa di buat diatas (yang memanggil route, url yang di tuju)
                url: url,
                // tipe data responsnya bentuk json (hanya bisa ini)
                dataType: 'json',
                // klo JS berhasil memporses permintaan request ke url tersebut, yang akan dilakukan :
                success: function(res) {
                    // res akan berisi data hasil proses pemgambilan di server (request urlnya)
                    // memunculkan modal yang id nya tambahh-stock
                    $('#tambah-stock').modal('show');
                    //element
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#stock').val(res.stock);
                }
            })
        }

        $("#tambah-stock").submit(function(e) {
            e.preventDefault();

            let id = $("#id").val();
            let url = "{{ route('medicine.stock.update', 'id') }}";
            url = url.replace("id", id);

            let data = {
                stock: $("#stock").val(),
            };

            $.ajax({
                // type disamakan dengan Route::
                type: "PATCH",
                // kirim route name
                url: url,
                // kirim data request $request
                data: data,
                cache: false,
                // kalau berhasil
                success: function(res) {
                    $("#tambah-stock").modal("hide");
                    // set seesin storage (penyimpanan browser sementara)
                    // buat prroperty data reliadAfterPageLoad data session js
                    sessionStorage.reloadAfterPageLoad = true;
                    //
                    window.location.reload();
                },
                // funtion tanpa nama dijalankan ketika web baru selesai reload
                error: function(err) {
                    // kalau err, id msg ditambah class
                    $('#msg').attr("class", "alert alert-danger");

                    $('#msg').text(err.responseJSON.message);
                }
            });
        });

        $(function() {
            if (sessionStorage.reloadAfterPageLoad) {
                $('#msg-success').attr("class", "alert alert-primary");
                $('#msg-success').text("berhasil menambahkan data stock!");
                sessionStorage.clear();
            }
        })
    </script>
@endpush
