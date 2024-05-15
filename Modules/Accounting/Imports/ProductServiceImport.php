<?php

namespace Modules\Accounting\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductServiceImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
    }
}
