<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
//  func collection : proses pengambilan data yan akann ditampilkan di excel
    public function collection()
    {
        return Order::with('user')->get();
    }
    // nama nama th dari file excel
    public function headings(): array{
        return[
        "Nama Pembeli", "Obat", "Total Bayar", "Tanggal"
        ];
    }
    // map : data yang akan dumunculkan di excelnya ( foreach di blade)
public function map($item) : array
{
    $dataObat = '';
    foreach ($item->medicines as $value) {
        $format = $value["name_medicines"] . "(qty " . $value['qty'] . "Rp. " . number_format($value['sub_price']) . "),";
        $dataObat .= $format;
    }
    return [
        $item->name_customer,
        $dataObat,
        $item->total_price,
        $item->user->name,
        \Carbon\Carbon::parse($item->created_at)->isoFormat($item->created_at),
    ];
}

}