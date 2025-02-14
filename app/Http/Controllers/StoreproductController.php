<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storeproduct;

class StoreproductController extends Controller
{
    public function create()
    {
        $input = [
            'name' => 'Gold',
            'details' => [
                'brand' => 'Jewellery', 
                'tags' => ['gold', 'jewellery', 'money']
            ]
        ];

       return Storeproduct::create($input);
    }
    public function search()
    {
        $storeproduct = Storeproduct::whereJsonContains('details->tags', 'money')->get();
        return $storeproduct;
    }
}
