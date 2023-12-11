@extends('layouts.template')

@section('content')
    <hr>
    <h2>Daftar Obat</h2>
    <br>
    <div id="msg-success"></div>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($medicines as $item)
                <tr>
                    <td>{{ ($medicines->currentpage() - 1) * $medicines->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td>
                        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-stock"
                            onclick="edit({{ $item['id'] }})">Tambah Stock</div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
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
                <form action="" method="post">
                    <div class="modal-body">
                        {{-- alert danger --}}
                        <div id="msg"></div>
                        <div>
                            <label for="name" class="form-label">Nama Obat</label>
                            <input type="text" name="name" id="name" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                        {{-- input type hiiden, digunakan untuk data yang nantinya berguna namun tidak ingin diperlihatkan ke user --}}
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
            // simpan url route yang edit ke dalam variable url, untuk path parameternay diisi dengan path dinamis versi js
            let url = "{{ route('medicine.show', "id") }}";
            // isi :id di url di atas diisi dari id argument func nya
            url = url.replace("id", id);

            // requets ke server lewat js, hanya bisa menggunakan perantara ajax
            $.ajax({
                // type method Route:: nya
                type: "GET",
                // url yg sudah dibuat di atas (yang ,anggil route, url yg dituju)
                url: url,
                // tipe datanya bentuk json (hanya bisa ini)
                dataType: "json",
                // klo js berhasil memproses permintaan request ke url tersebut, yg akan dilakukan
                success: function(res) {
                    // res akab berisi data hasil proses pengambilan di server (request url nya)
                    // memunculkan modal yang id nya tambah stock
                    $('#tambah-stock').modal('show');
                    // elemen html yg id nya id pada halaman ini, valuenya akan diiisi dengan data response bagian id, begitupun yang lainnya
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#stock').val(res.stock);
                }
            })
        }
        // ketika el html id tambah-stock di submit form, akan menjalankan function yg mengambil seluruh bagian el dr tambah-stock tersebut (e)
        $('#tambah-stock').submit(function(e) {
            // form nya akan di ambil alih seluruh proses nya oleh js
            e.preventDefault();

            //variable id isinya value dari tag id="id"
            let id = $("#id").val();
            let url = "{{ route('medicine.stock.update', "id") }}";
            url = url.replace("id", id);
            // siapkan data yg akan dikirim ke Request $requets
            let data = {
                stock: $("#stock").val(),
            };

            $.ajax({
                type: "PATCH",
                url: url,
                data: data,
                cache: false,
                // In the success callback function
                success: function(res) {
                    $("#tambah-stock").modal("hide");
                  
                    sessionStorage.reloadAfterPageLoad = true;

                    window.location.reload();
                },

                error: function(err) {
                    // klo err, id msg ditambah class isinya alert
                    $('#msg').attr("class", "alert alert-danger");
                    // isi text alertnya ambil dr responseJSON
                    $('#msg').text(err.responseJSON.message);
                }
            })
        });
        // func tanpa nama di jalankan ketika web baru selesai reload
        $(function() {
            // kalau di session js nya ada property
            if (sessionStorage.reloadAfterPageLoad) {
                $('#msg-success').attr("class", "alert alert-success");
                $('#msg-success').text("Berhasil menambahkan data stock");
                sessionStorage.clear();
            }
        })
    </script>
@endpush
