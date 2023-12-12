<?php

namespace App\Exports;

use App\Models\Order;
// export function collection, heading, map
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // func collection : proses pengambilan data yang akan ditampilkan di excel
    public function collection()
    {
        // kalau semua pake all()
        return Order::with('user')->get();
    }
    // headings : nam anama th dari file excel nya
    public function headings(): array
    {
        return[
            "Nama Pembeli", "Obat", "Total Bayar", "Kasir", "Tanggal"
        ];
    }
    // map : data yang akan dimunculkan di excelnya ( sama kaya foreach di blade )
    public function map($item): array
    {
        $dataObat = '';
        foreach ($item->medicines as $value) {
            //  ubah object/array data dr column medicines ny amenjadi string dengan hasil : Vitamin A (qty 2 : Rp. 18.000)
            $format = $value["name_medicine"] . " (qty" . $value['qty'] . " : Rp. " . number_format($value['sub_price']) . "),";
            $dataObat .= $format;
        }
        return[
            $item->name_customer,
            $dataObat,
            $item->total_price,
            $item->user->name,
            \Carbon\Carbon::parse($item->create_at)->isoFormat($item->created_at),
        ];
    }
}
