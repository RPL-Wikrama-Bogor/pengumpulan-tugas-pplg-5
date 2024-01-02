<?php

namespace App\Exports;

use App\Models\order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExports implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return order::with('user')->get();
    }

    public function headings():array
    {
        return [
            "Nama Pembeli", "Obat", "Total Bayar", "kasir", "Tanggal"
        ];
    }

    public function map($item):array
    {
        $dataObat = '';
        foreach ($item->medicines as $value) {
            $format = $value["name_medicine"] . " (qty " . $value['qty'] . " : Rp. " . number_format($value['sub_price']) ."),";
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
