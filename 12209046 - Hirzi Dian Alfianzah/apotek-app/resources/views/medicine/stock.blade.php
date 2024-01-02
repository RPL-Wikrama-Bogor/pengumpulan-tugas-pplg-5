@extends('layouts.template')

@section('content')
    {{-- menyimpan alert success dr jquery ajax --}}
    <div id="msg-success"></div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1;   @endphp
            @foreach ($medicine as $item)
                <tr>
                    <td>{{ ($medicine->currentpage() - 1) * $medicine->perpage() + $loop->index + 1 }}</td>
                    <td class="text-center">{{ $item['name'] }}</td>
                    <td class="text-center">{{ $item['stock'] }}</td>
                    <td class="d-flex justify-content-center">
                        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-stock"
                            onclick="edit({{ $item['id'] }})">Tambah Stock</div>

                    </td>
                    <td class="d-flex">
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- //memunculkan pagination --}}
    <div class="d-flex justify-content-end">
        {{-- pagination dimunculin hanya jika --}}
        @if ($medicine->count())
            {{ $medicine->links() }}
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
                {{-- menyimpan alat denger --}}
                <div id="msg"></div>
                <div>
                    <label for="name" class="form-label">Nama Obat :</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div>
                    <label for="stock" class="form-label">Stock :</label>
                    <input type="number" name="stock" id="stock" class="form-control">
                </div>
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        })

        function edit(id) {
            // Simpan URL route yang edit kedalam variabel URL,
            let url = "{{ route('medicine.show', 'id') }}";
            // Gantilah ":id" dengan nilai id yang diterima sebagai parameter
            url = url.replace('id', id);

            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function(res) {
                    $('#tambah-stock').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#stock').val(res.stock);
                }
            });
        }

        $("#tambah-stock").submit(function(e) {
            e.preventDefault();

            let id = $("#id").val();
            let url = "{{ route('medicine.stock.update', 'id') }}";
            url = url.replace('id', id);

            let data = {
                stock: $("#stock").val(),
            };

            $.ajax({
                //type disamakan dengan route::
                type: "PATCH",
                //kirim data request $request
                url: url,
                data: data,
                cache: false,
                //kalao berhasil
                success: function(res) {
                    $("#tambah-stock").modal('hide');
                    //set session storage(penyimpanan browser sementara
                    //buat property data realodAfterPageLoad pada session js
                    sessionStorage.reloadAfterPageLoad = true;
                    //refresh halaman
                    window.location.reload();
                },

                error: function(err) {
                    //kalali err, id msg ditambahkan class isinya alert
                    $('#msg').attr("class", "alert alert-danger");
                    //isi text alertnya ambil dari response JSON bagian massage
                    $('#msg').text(err.responseJSON.message);
                }
            })

        });

        $(function() {
            if (sessionStorage.reloadAfterPageLoad) {
                //tambah class alert di id="msg-succes"
                $('#msg-success').attr("class", "alert alert-success");
                //isi text di alertnya
                $("#msg-success").text("Berhasil menambahkan data stock!");
                //hapus session js tersebut agar alert hanya muncul setelah reload update data aja,reload selain itu gak dimunculkan
                sessionStorage.clear();
            }
        })
    </script>
@endpush
