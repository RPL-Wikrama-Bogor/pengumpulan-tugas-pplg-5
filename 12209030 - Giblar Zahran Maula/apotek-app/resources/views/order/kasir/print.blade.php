<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembelian</title>
    <style>
        html{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        #back-wrap {
            margin: 30px auto 0 auto;
            width: 500px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back {
            width: fit-content;
            padding: 8px 15px;
            color: #fff;
            background: #9b9a9a;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 3rem;
        }
        .btn-back:hover{
            background: #7a7a7a;
        }

        #receipt {
            box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin: 30px auto 0 auto;
            width: 500px;
            background: #fff;
        }

        h2 {
            font-size: .9rem;
        }

        p {
            font-size: .8rem;
            color: #666;
            line-height: 1.2rem;
        }

        #top {
            margin-top: 25px;
        }

        #top .info {
            text-align: left;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px 0 5px 15px;
            border: 1px solid #EEE;
        }

        .tabletitle {
            font-size: .5rem;
            background: #EEE;
        }

        .service {
            border-bottom: 1px solid #EEE;
        }

        .itemtext {
            font-size: .7rem;
        }

        #legalcopy {
            margin-top: 15px;
        }

        .btn-print {
            
            color: white;
            background-color: #9b9a9a;
            padding: 10px;
            border-radius: 10px;
            text-decoration: none;

        }
        .btn-print:hover{
            background: #7a7a7a;
        }
       
    </style>

</head>

<body>
    <div id="back-wrap">
        <a href="{{ route('cashier.order.download', $order['id']) }}" class="btn-print"><img src="{{ asset('image/downloads.png') }}" alt="Deskripsi Gambar" style="width:1.5rem;">
        </a>
        <a href="{{ route('cashier.order.index') }}" class="btn-back" style="float:left;"><img src="{{ asset('image/return.png') }}" alt="Deskripsi Gambar" style="width:1.5rem;"></a>
    </div>
    <div id="receipt">
        <center id="top">
            <div class="info">
                <h2>Apotek nisa kecil</h2>
            </div>
        </center>
        <div class="mid">
            <div class="info">
                <p>
                    Alamat : jalan jalan <br>
                    Email : annisaaulia@gmail.com<br>
                    Phone : 000-111-222<br>
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
                    @foreach (json_decode($order['medicines'],true) as $medicine)
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