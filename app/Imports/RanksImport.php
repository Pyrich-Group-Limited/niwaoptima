<?php

namespace App\Imports;

use App\Models\Rank;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RanksImport implements ToModel, SkipsEmptyRows, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Rank([
            'name'     => $row['name'],
            'department_id'    => $row['department_id'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'department_id' => 'required|numeric',
        ];
    }
}
