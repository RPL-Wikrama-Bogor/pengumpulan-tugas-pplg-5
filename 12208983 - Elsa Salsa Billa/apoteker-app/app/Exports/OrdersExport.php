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
    //proses pengambilan data yg mau ditampilkan diexcel
    public function collection()
    {
        return Order::with('user')->get();
    }

    //headings: nama-nama th dari file excel
    public function headings(): array
    {
        return [
            "Nama Pembeli", "Obat", "Total Bayar", "Kasir", "Tanggal"
        ];
    }

    //map : data yg akan ditampilkan diexcelnya(sama ky forecah di blade)
    public function map($item): array
    {
        $dataObat ='';
        foreach ($item->medicines as $value) {
            //ubah object/array data dr column medicines nya menjadi string dngan hasil : vitamin A (qty 2 : Rp. 18.000)
            $format = $value["name_medicine"] . " (qty" . $value['qty'] . " : Rp." . number_format($value['sub_price']) . "),";
            $dataObat .= $format;
            // kenapa . karna buat nge konket string di php itu pakenya . bukan +
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
