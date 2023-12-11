<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \illuminate\Support\Collection
    */

    // func collection : proses pengambilan dta yang akan di tampilkan di excel
    public function collection()
    {
        return Order::with('user')->get();
    }

    // headings: nama-nama th dari file excel
    public function headings() : array{
        return[
            "Nama Pembeli", "Obat", "Total Bayar", "kasir", "tanggal", 
        ];
    }
    // map : data yang akan di munculkan di excelnya (sama kayak foreach di blade)
    public function map($item) : array 
    {
        $dataObat = '';
        foreach($item->medicines as $value){
            // ubah object/array data dari column medicines nya menjadi string dengan hasil : Vitamin A (qty 3 : Rp. 18.000)
            $format = $value["name_medicines"] . "(qty" . $value['qty'] . ": Rp. " . number_format($value['sub_price']) . "),";
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
