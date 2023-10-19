<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    public function __construct($productData)
    {
        $this->productData = $productData;
    }

  
    public function collection()
    {
        // Transform the product data to a collection of arrays
        $data = collect($this->productData)->map(function ($item) {
            return (array) $item; // Cast each item to an associative array
        });

        return $data;
    }

    
}
