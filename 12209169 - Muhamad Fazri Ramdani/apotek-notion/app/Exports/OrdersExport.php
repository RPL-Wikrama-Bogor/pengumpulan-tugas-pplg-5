<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WIThMapping;


class OrdersExport implements FromCollection,WithHeadings,WIThMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //func cellection = proedes pengambilan data yang akan di tampilkan di excel
    public function collection()
    {
        return order::with('user')->get();
    }
    //headings = nama-nama th dari file excel
    public function headings():array 
    {
        return [
            'Nama pembeli',
            'Obat',
            'Total Bayar',
            'Kasir',
            'Tanggal',
        ];
    }
    //map: data yang akan di munculkan di excelnya (sama kaya foreach di blade)
    public function map($item) : array
    {
        $dataObat = '';
        foreach ($item->medicines as $value) {
            $format = $value["name_medicines"]. " (qty ". $value['qty'].":Rp.".number_format($value['sub_price'])."),";
            $dataObat .= $format;
        }
        return[
            $item->nama_customer,
            $dataObat,
            $item->total_price,
            $item->user->name,
            \Carbon\Carbon::parse($item->created_at)->isoFormat($item->created_at),
        ];

    }
}