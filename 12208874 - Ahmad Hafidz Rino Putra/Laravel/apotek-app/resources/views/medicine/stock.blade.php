@extends('layouts.template')

@section('content')
    <div id="msg-success"></div>
    <table class="table table-bordered table-striped mt-5">
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
                    <td>{{ ($medicines->currentpage() - 1) * $medicines->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td class="text-center">{{ $item['stock'] }}</td>
                    <td class="d-flex justify-content-center">
                        <div class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#tambah-stock"
                            onclick="edit({{ $item['id'] }})"><i class="fa-solid fa-plus fa-2xs"></i>Tambah Stock</div>
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
    <div class="modal fade" id="tambah-stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="model-body">
                            <div id="msg">
                                </div=>
                                <div>
                                    <label for="name" class="form-label">Nama Obat</label>
                                    <input type="text" name="name" id="name" class="form-control" disabled>
                                </div>
                                <div>
                                    <label for="name" class="form-label">Stock</label>
                                    <input type="number" name="stock" id="stock" class="form-control">
                                </div>
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
            let url = "{{ route('medicine.show', 'id') }}";
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
                type: "PATCH",
                url: url,
                data: data, 
                cache: false,
                success: function(res) {
                    $('#tambah-stock').modal("hide");
                    sessionStorage.reloadAfterPageLoad = true;
                    window.location.reload();
                },
                error: function(err) {
                    $('#msg').attr("class", "alert alert-danger");
                    $('#msg').text(err.responseJSON.message);
                }
            });
        });

        $(function() {
            if (sessionStorage.reloadAfterPageLoad) {
                $('#msg-success').attr("class", "alert alert-success");
                $('#msg-success').text("Berhasil menambahkan data stock");
                sessionStorage.clear();
            }
        });
    </script>
@endpush
