<?php

namespace App\Exports;

use App\Models\Lates;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LatesExport implements FromCollection, WithHeadings
{
    protected $groupLates;

    public function __construct($groupLates)
    {
        $this->groupLates = $groupLates;
    }

    public function collection()
    {
        // Flatten the grouped data
        return collect($this->groupLates)->flatMap(function ($group) {
            // Modified: Take only the first item from each group
            return $group->take(1);
        });
    }


    public function headings(): array
    {
        return [
            'Nis',
            'Nama',
            'Rombel',
            'Rayon',
            'Total Keterlambatan',
        ];
    }

    public function map($item): array
    {
        $data = [];

        foreach ($this->groupLates as $nis => $group) {
            $data[] = [
                'Nis' => optional($item->students)->nis,
                'Nama' => optional($item->students)->name,
                'Rombel' => optional(optional($item->students)->rombels)->name,
                'Rayon' => optional(optional($item->students)->rayons)->name,
                'Total Keterlambatan' => $group->count(),
            ];
        }

        return $data;
    }

}
