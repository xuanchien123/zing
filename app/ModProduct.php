<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Translate;
use Session,DB;

class ModProduct extends Model
{
    //
    protected $table = "modproducts";
    public $timestamps = false; 

    public function namelist($id){
		$lang = Session::get('idlocale');
		$name = Translate::select('trname')->where('trcate',1)->where('tridlang',$lang)->where('trid',$id)->first() ?: Translate::select('trname')->where('trcate',1)->where('trid',$id)->first() ;
	    return $name;
    }
    public function product_in_mod($modid){
        $listpost = ListProduct::where('listidmod',$modid)->get();
        $listpostid_arr=array();
        foreach ($listpost as $listpost_row) {
          array_push($listpostid_arr,$listpost_row->id);         
        }
            $product  = Product::select('*', DB::raw('products.id as idproduct'))
   								->wherein('products.idlist',$listpostid_arr)
	        					->join("productdetail","products.id", "=", "productdetail.idproduct")
	        					->where('productdetail.idlang',$this->idlang)
	        					->orderBy('products.id', 'desc')
                                ->where('hide', 0)
								->where('status', 5)
    							->skip(0)
    							->take(6)
    							->get();
        return $product;
    }
    public function list_in_mod($modid){
        $list = ListProduct::where('listidmod',$modid)->get();
        return $list;
    }
}
