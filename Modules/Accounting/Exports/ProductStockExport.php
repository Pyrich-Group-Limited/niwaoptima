<?php

namespace Modules\Accounting\Exports;

use Modules\Accounting\Models\StockReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductStockExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = [];
        $data = StockReport::where('created_by' , Auth::user()->id)->get();
        if (!empty($data)) {
            foreach ($data as $k => $Stock) {
                // $product  = $Stock->product_id;
                $product = StockReport::products($Stock->product_id);

                // dd($product);
                unset($Stock->created_by,$Stock->updated_at,$Stock->type_id);
                $data[$k]["product_id"]        = $product;
            }
        }    
        return $data;
    }

    public function headings(): array
    {
        return [
            "Stock Id",
            "Product Name",
            "Quantity",
            "Type",
            "Description",
            "Date",
        ];
    }
}
