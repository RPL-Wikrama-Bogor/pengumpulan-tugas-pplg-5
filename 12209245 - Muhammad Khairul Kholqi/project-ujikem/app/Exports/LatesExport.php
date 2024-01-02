<?php

namespace App\Exports;

use App\Models\lates;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LatesExport implements FromCollection, WithHeadings, WithMapping
{
    protected $groupLates;

    public function __construct($groupLates)
    {
        $this->groupLates = $groupLates;
    }

    public function collection()
    {
        // Modified: Use $this->groupLates to get the grouped lates data
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
        return [
            $item->students->nis,
            $item->students->name,
            $item->students->rombel_id,
            $item->students->rayon_id,
            // Modified: Count occurrences for each student
            $this->groupLates[$item->students->nis]->count(),
        ];
    }
}
