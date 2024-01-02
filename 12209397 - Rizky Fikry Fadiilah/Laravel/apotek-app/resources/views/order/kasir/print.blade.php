<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #back-wrap {
            margin: 30px auto 0 auto;
            width: 500px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back, .btn-print {
            margin-top: 10px;
            padding: 8px 15px;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-back {
            background: #666;
        }

        .btn-print {
            background: red;
        }

        #receipt {
            box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin: 30px auto 0 auto;
            width: 500px;
            background: #fff;
        }

        h2 {
            font-size: 1rem;
        }

        p {
            font-size: 0.8rem;
            color: #666;
            line-height: 1.2rem;
        }

        #top, .bot {
            background-color: #f5f5f5;
            padding: 10px;
        }

        .info {
            text-align: left;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        td {
            padding: 10px 0 10px 15px;
            border: 1px solid #EEE;
        }

        .tabletitle, .service {
            background-color: #f5f5f5;
        }

        .tableitem {
            padding: 10px 0 10px 15px;
            border: 1px solid #EEE;
        }

        .tabletitle h2, .service p, .itemtext {
            font-size: 0.8rem;
        }

        .payment h2 {
            font-size: 1rem;
        }

        .legalcopy {
            margin-top: 15px;
            font-size: 0.8rem;
        }
    </style>

</head>

<body>
    <div id="back-wrap">
        <a href="{{ route('kasir.order.index') }}" class="btn-back">Kembali</a>
    </div>
    <div id="receipt">
        <a href="{{ route('kasir.order.download', $order['id'])}}" class="btn-print">Cetak (.pdf)</a>
        <div id="top">
            <div class="info">
                <h2>Apotek Sufyan</h2>
            </div>
        </div>
        <div class="mid">
            <div class="info">
                <p>
                    Alamat : Jalan Cicurug<br>
                    Email : apotek@gmail.com<br>
                    Phone : +62-111-222<br>
                </p>
            </div>
        </div>
        <div class="bot">
            <div class="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Obat</h2>
                        </td>
                        <td class="item">
                            <h2>Total</h2>
                        </td>
                        <td class="Rate">
                            <h2>Harga</h2>
                        </td>
                    </tr>
                    @foreach ($order['medicine'] as $medicine)
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext">{{ $medicine['name_medicine'] }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $medicine['qty'] }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">Rp. {{ number_format($medicine['price'], 0, ',', ',') }}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>PPN (10%)</h2>
                        </td>
                        @php
                            $ppn = $order['total_price'] * 0.01;
                        @endphp
                        <td class="payment">
                            <h2>Rp. {{ number_format($ppn, 0, ',', ',') }}</h2>
                        </td>
                    </tr>
                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>Total Harga</h2>
                        </td>
                        <td class="payment">
                            <h2>Rp. {{ number_format($order['total_price'], 0, ',', ',') }}</h2>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="legalcopy">
                <p class="legal"><strong>Terima kasih atas pembelian Anda!</strong>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
