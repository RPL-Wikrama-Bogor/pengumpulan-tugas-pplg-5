<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // proses pengambilan data yang akan di tampilkan di excel
    public function collection()
    {
        return Order::with('user')->get();
    }

    public function headings(): array 
    {
        return [
            "Nama Pembeli", "Obat", "Total Bayar", "Kasir", "Tanggal"
        ];
    }

    public function map($item): array
    {
        $dataObat = '';
        foreach ($item->medicine as $value) {
            $format = $value["name_medicine"] . " (qty " . $value['qty'] . " : Rp. " . number_format($value['sub_price']) . "),";
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
