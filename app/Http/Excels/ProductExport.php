<?php

namespace App\Http\Excels;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    public function collection()
    {
        return Product::all();
    }
}
