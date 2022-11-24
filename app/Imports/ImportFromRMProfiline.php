<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Illuminate\Support\Facades\Log;
use App\Models\Category;


class ImportFromRMProfiline implements ToModel, WithBatchInserts, WithChunkReading, WithHeadingRow, WithUpserts
{

    protected $categories;

    public function __construct ($categories) {
        $this->categories = $categories;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) 
    {
        if ($row['nazvanie'] != null && $row['nazvanie'] != '') {
            return new Product([
                'art'  => $row['artikul'],
                'category_id' => $this->categories[$row['kategoriya']],
                'maker_id' => 1,
                'name' => $row['nazvanie'],
                'brand' => $row['brend'],
                'price' => $row['cena_rub'],
                'nalichie' => $row['nalicie'],
            ]);
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return ['name', 'maker_id'];
    }
}
