@extends('layouts.template')

@section('content')
    {{-- menampilkan alert success dari jquery ajax --}}
    <div id="msg-success"></div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>nama</th>
                <th class="text-center">aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1;  @endphp
            @foreach ($medicines as $item)
                <tr>
                    <td>{{ $no++;}}</td>
                    <td>{{ $item['name'] }}</td>
                    <td class="text-center">{{ $item['stock'] }}</td>
                    <td class="d-flex-justify-content-center">
                        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-stock"
                            onclick="edit({{ $item['id'] }})">Tambah stock</div>
                        
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ubah data stock </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div id="msg"></div>
                        <div>
                            <label for="name" class="form-tabel">Nama obat</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div>
                            <label for="stock" class="form-label">stock</label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                        <input type="hidden" name="id" id="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <div class="btn btn-primary" onclick="update()">Simpan</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function edit(id) {
            let url = "{{ route('medicine.show', 'id') }}";
            url = url.replace("id", id);

            //request ke server lewat javascript hanya bisa menggunakan perantara ajax
            $.ajax({
                type: "GET",
                url: url,
                datatype: 'json',
                success: function(res) {
                    $('#tambah stock').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#stock').val(res.stock);
                }
            });
        }

        function update() {
            console.log('y');

            let id = $("#id").val();
            let url = "{{ route('medicine.stock.update', 'id') }}";
            url = url.replace("id", id);

            let data = {
                stock: $("#stock").val(),
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "PATCH",
                url: url,
                data: data,
                cache: false,

                success: function(res) {
                    $("#tambah-stock").modal("hide");

                    sessionStorage.reloadAfterPageload = true;

                    window.location.reload();
                },
                error: function(err) {
                    //kalau di session js nya ada properti reloadAfterPageLoad
                    $('#msg').attr("class", "alert alert-danger");
                    $('#msg').text(err.responseJSON.message);
                }
            });
        }

        $(function() {

            if (sessionStorage.reloadAfterPageload) {
                $('#msg-success').attr('class', 'alert alert-success');
                $('#msg-success').text('berhasil menambahkan data stock');
                sessionStorage.clear();
            }
        });
    </script>
