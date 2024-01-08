<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 20px;
        }

        .footer {
            text-align: right;
            font-style: italic;
            color: #888;
        }

        /* Button style */
        .btn {
            display: block;
            width: 100%;
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Style tambahan bisa ditambahkan sesuai kebutuhan */
    </style>
</head>
<body>
    <div class="header">
        <h3>Surat Pernyataan</h3>
        <h3>Tidak akan datang terlambat kesekolah lagi</h3>
        <hr>
    </div>
    @foreach ($datasiswa as $item)
    <div class="content">
        <p>yang bertanda tangan dibawah ini!</p>
        <p>Nis     :{{$item->nis}}</p>
        <p>Nama    :{{$item->name}}</p>
        <p>Rombel  :{{$item->rombel_id}}</p>
        <p>Rayon   :{{$item->rayon_id}}</p>
        <br>
        <p>Dengan ini saya menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah yaitu
            terlambat datang ke sekolah sebanyak @foreach ($jumlahdata as $item) {{$item->total}}   @endforeach kali yang mana hal tersebut termasuk kedalam
            pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi, dan apabila
            saya terlambat lagi saya siap diberi sanksi.
        </p>
        <br>
        <p>Demikian Surat Pernyataan terlambat ini saya buat dengan dengan penuh penyesalan.</p>
    </div>
    @endforeach

    <div class="footer">
        @foreach ($datalate as $item)
         <p>Bogor, {{$item->date_time_late }}</p>  
        @endforeach
        
        <p>pembimbing siswa</p>
        <p>.........</p>

        <a href="{{route('terlambat.download',$item->id)}}" class="btn">Cetak (.pdf)</a>
    </div>
</body>
</html>
