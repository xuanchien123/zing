<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Translate;
use Session,DB;

class ListProduct extends Model
{
    //
    protected $table = "listproducts";
    public $timestamps = false; 

    public function modpro($id){
        $lang = Session::get('idlocale');
        $name = Translate::select('trname')->where('tridlang',$lang)->where('trcate',1)->where('trid',$id)->first();
        return $name;
    }
    public function namelist($id){
    	$lang = Session::get('idlocale');
    	$name = Translate::select('trname')->where('tridlang',$lang)->where('trcate',2)->where('trid',$id)->first();
        return $name;
    }
    public function product_in_list($listid){
        // dd($listid);
        $product  = Product::select('*', DB::raw('products.id as idproduct'))                                
                                ->join("productdetail","products.id", "=", "productdetail.idproduct")                              
                                ->where('hide', 0)
                                ->where('products.idlist',$listid)
                                ->orderBy('products.id', 'desc')
                                ->take(6)
                                ->get();
        return $product;
    }
    public function product_in_list_all($listid){
        // dd($listid);
        $product  = Product::select('*', DB::raw('products.id as idproduct'))                                
                                ->join("productdetail","products.id", "=", "productdetail.idproduct")
                                ->where('hide', 0)
                                ->where('products.idlist',$listid)
                                ->orderBy('products.id', 'desc')
                                ->get();
        return $product;
    }
    public function modname($is){
        $data = ModProduct::where('id',$id)->first();
        return $data;
    }
}
