<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromView
// ,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function view(): View
    {
        return view("order.admin.export",[
            'orders' => Order::all(),
            
        ]);
}

// public function map($data):array
// {
//     return [
//   $data->user->name,
//   $data->medicines,
//   $data->medicines,
// $data->total_price;
//$data->name_customer,


//     ];
// }

// public function headings():array
// {
//     return [
//         'KASIR',
//         'NAMA_OBAT'
//         'harga'
//         'nama Pembeli'
//     ];
// }
}
