<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return response()->json([
            ['id'=> 1, 'name' => 'product 1' ],
            ['id'=> 2, 'name' => 'product 2' ],
            ['id'=> 3, 'name' => 'product 3' ],
            ['id'=> 4, 'name' => 'product 4' ],
        ]);
    }
}
