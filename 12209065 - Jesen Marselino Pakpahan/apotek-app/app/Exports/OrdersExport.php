<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Order::with('user')->get();
    }
    public function headings():array
    {
        return[
            "Nama Pembeli", "Obat", "Kasir", "Tanggal"
        ];
    }
    public function map($item):array
    {
        $dataObat = '';
        foreach ($item->medicines as $value) {
            $format = $value["name_medicines"] . "(qty". $value['qty'] . " : Rp." .
            number_format($value['sub_price']) . "),";
            $dataObat .= $format;
        } 
        return [
            $item->name_customer,
            $dataObat,
            $item->total_price,
            $item->name,
            \Carbon\Carbon::parse($item->created_at)->isoFormat($item->created_at),
        ];
    }
}