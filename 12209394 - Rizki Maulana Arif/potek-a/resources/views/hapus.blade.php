
<x-app-layout>
    <style>
        .mt-5{
            padding:5%; 
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="mt-5">
        <h2>Apakah kamu yakin ingin menghapus data: {{$data->nama_obat}} | {{$data['tipe']}}</h2><br>
        <form action="/obat-destroy/{{$data->id}}" style="display: inline-block" method="post">
            @csrf
@method('delete')
<x-danger-button class="ml-3">
    {{ __('hapus') }}
</x-danger-button>
    </form>
      <a href="/tampil" class="btn">Cancel</a>
    </div>




</x-app-layout>
