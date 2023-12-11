<?php

namespace App\Exports;

use App\Models\Order;
//export function collection, headings, map
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Withmapping;

class OrderExport implements FromCollection, WithHeadings, Withmapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //function collection : proses pengambilan data yang akan ditampilkan di excel
    public function collection()
    {
        return Order::with('user')->get();
    }

    //Headings: nama nama th dari file excel
    public function headings(): array
    {
        return[
        "nama Pembali", "Obat", "Total Bayar", "Kasir", "Tanggal"
        ];
    }

    //map : data yang akan dimunculan di excelnya(foreach di blade)
    public function map($item): array
    {
        $dataObat = '';
        foreach ($item->medicines as $value) {
            //ubah object/array data dari colum medicines nya menjadi string dengan hasil : vitamin A (qtr 2 : Ro. 18.000),
            $format = $value["name_medicine"] . "(qty" . $value['qty'] . " : Rp. ".
            number_format($value['sub_price']) . "),";
            $dataObat .= $format;
        }
        return[
            $item->name_customer,
            $dataObat,
            $item->total_price,
            $item->user->name,
            \Carbon\Carbon::parse($item->created_at)->isoFormat($item->created_at),
        ];
    }
}
