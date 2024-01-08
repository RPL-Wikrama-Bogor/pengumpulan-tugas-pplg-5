<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembelian</title>
    <style>
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
            background: #666;
            border-radius: 5px;
            text-decoration: none;
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
            float: right;
            color: #333;
        }
    </style>

</head>

<body>
    <div id="receipt">
        <center id="top">
            <div class="info">
                <h2>Apotek Suka Bapak</h2>
            </div>
        </center>
        <div class="mid">
            <div class="info">
                <p>
                    Alamat : Jalan Breach<br>
                    Email : apotekSukaBapak@gmail.com<br>
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
                    @foreach($order['medicines'] as $medicine)
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
                            $ppn = $order['total_price'] * 0.1;
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