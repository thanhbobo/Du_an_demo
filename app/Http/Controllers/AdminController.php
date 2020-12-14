<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillDetail;
use App\Bills;
use App\Customer;
use App\Products;
use App\TypeProducts;

class AdminController extends Controller
{
	 public function getIndex()
    {
        $bills = Bills::all();
        $new_products = Products::where('new',1)->get();
        //select products.*, count(bill_detail.id_product) as 'countId' from products join bill_detail on products.id = bill_detail.id_product GROUP by products.id ORDER by countId DESC

        $sp_banchays = Products::join('bill_detail', 'bill_detail.id_product', '=', 'products.id')
        				->selectRaw('products.*, count(bill_detail.id_product) as countId')
        				->groupBy('products.id')
        				->orderBy('countId', 'DESC')
        				->take(3)
        				->get();
        //dd($sp_banchays);
        //$type_products = TypeProducts::all();
        return view('admin.index',['new_products' => $new_products,'sp_banchays' => $sp_banchays,'bills' => $bills]);

    }
}