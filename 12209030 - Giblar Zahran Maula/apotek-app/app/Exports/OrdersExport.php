<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Withheadings;
use Maatwebsite\Excel\Concerns\Withmapping;

class OrdersExport implements FromCollection, Withheadings, Withmapping
{
    /**
    * @return \Illuminate\Support\Collection
    */ // func collection adalah proses pengambilan data yang akan ditambpilkan di excel
    public function collection()
    {
        return Order::with('user')->get();
    }
    //headings : nama nama th dari file excel
    public function headings():array
    {
        return [
            "Nama pembeli", "obat", "total bayar", "kasir","tanggal"

        ];
    }

    public function map($item) : array
     {
        $dataObat = '';
        foreach (json_decode($item->medicines,true ) as $value){
            //ubah object array data dari column medicines nya menjadi string dengan hasil : vitamin A ()
            $format = $value["name_medicine"] . " (qty ". $value['qty'] . "Rp. ".
            number_format($value['sub_price']). "),";
            $dataObat .= $format;
        }
        return [
            $item->name_customer,
            $dataObat,
            $item->total_price,
            $item->user->name,
            \Carbon\Carbon::parse($item->created_at)->isoFormat($item->created_at),
        ];
        //botol tuperware, laptop, sereh 3 batang, jahe merah , ketumbar , ram sodim, sabuk jangan lupa, ketika mimpi mu yang begitu indah tak pernah terwujud ya sudah lah, aku anak sehat tubuh ku bau menyan, karena ibu ku ratu silumanw 
        
    }
}
